<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ReservedAccount;
use App\Models\User;
use App\Models\Wallet;
use App\Providers\RouteServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }
    public function doctorRegister()
    {
        return view('auth.doctor_register');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|confirmed|min:6',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }

        $year = date('y');
        $month = Carbon::now()->format('m');
        $users = User::all()->count() + 1;
        $number = sprintf("%03d", $users);
        $reg = $year . $month . $number;
        
        $validatedData = $validator->validated();

        $fullName = $validatedData['first_name'] . ' ' . $validatedData['last_name'];
        $firstName = explode(' ', $fullName)[0]; 
        $randomString = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 4);
        $username = $firstName . $randomString;
        
        // Create the user account
        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'username' => $username,
            'number' => $reg,
            'password' => Hash::make($validatedData['password']),
        ]);
        

        try {
            // Get the Monnify access token
            $accessToken = $this->getAccessToken();

            // Create Monnify reserved account
            $monnifyReservedAccount = $this->createMonnifyReservedAccount($user, $accessToken);

            // Save Monnify reserved account details in the reserved_accounts table
            ReservedAccount::create([
                'user_id' => $user->id,
                'customer_email' => $monnifyReservedAccount->customerEmail,
                'customer_name' => $monnifyReservedAccount->customerName,
                'accounts' => json_encode($monnifyReservedAccount->accounts), // Convert the object to JSON string
            ]);

            // Create a wallet for the user
            Wallet::create([
                'user_id' => $user->id,
                'balance' => 0, // Set initial balance to 0
            ]);

            // Return a success response
            return response()->json([
                'status' => 200,
                'message' => 'You have been registered successfully. Redirecting to login.',
            ]);
        } catch (\Exception $e) {
            // Handle any exceptions or errors here
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage(),
            ]);
        }
    }

    private function getAccessToken()
    {
        $monnifyKeys = DB::table('monnify_a_p_i_s')->first();
        $apiKey = $monnifyKeys->public_key;
        $secretKey = $monnifyKeys->secret_key;

        $encodedKey = base64_encode($apiKey . ':' . $secretKey);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandbox.monnify.com/api/v1/auth/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                "Authorization: Basic $encodedKey",
            ),
        ));

        $response = curl_exec($curl);
        $httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            throw new \Exception("cURL Error: " . $err);
        }

        if ($httpStatus !== 200) {
            throw new \Exception("Monnify API request failed. Error Response: " . $response);
        }

        $monnifyResponse = json_decode($response);

        if (!$monnifyResponse->requestSuccessful) {
            throw new \Exception($monnifyResponse->responseMessage);
        }

        return $monnifyResponse->responseBody->accessToken;
    }

    private function createMonnifyReservedAccount(User $user, $accessToken)
    {
        $accountReference = uniqid('abc', true);
        $accountName = $user->first_name;

        $monnifyKeys = DB::table('monnify_a_p_i_s')->first();
        $contractCode = $monnifyKeys->contract_code;

        $currencyCode = 'NGN';
        $contractCode = $contractCode;
        $customerEmail = $user->email;
        $customerName = $user->first_name;
        $getAllAvailableBanks = true;

        $data = [
            'accountReference' => $accountReference,
            'accountName' => $accountName,
            'currencyCode' => $currencyCode,
            'contractCode' => $contractCode,
            'customerEmail' => $customerEmail,
            'customerName' => $customerName,
            'getAllAvailableBanks' => $getAllAvailableBanks,
        ];

        $jsonData = json_encode($data);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandbox.monnify.com/api/v2/bank-transfer/reserved-accounts',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $accessToken,
            ),
        ));

        $response = curl_exec($curl);
        $httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            throw new \Exception("cURL Error: " . $err);
        }

        if ($httpStatus !== 200) {
            throw new \Exception("Monnify API request failed. Error Response: " . $response);
        }

        $monnifyResponse = json_decode($response);

        if (!$monnifyResponse->requestSuccessful) {
            throw new \Exception($monnifyResponse->responseMessage);
        }

        return $monnifyResponse->responseBody;
    }



    public function doctorStore(Request $request)
    {
        // Validate the incoming request data
        $this->validate($request, [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'rank' => 'required',
            'speciality' => 'required|array',
            'contact_phone' => 'required',
            'experience' => 'required',
            'languages' => 'required|array',
            'folio' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'state' => 'required',
            'lga' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);


        $year = date('y');
        $month = Carbon::now()->format('m');
        $users = User::all()->count() + 1;
        $number = sprintf("%03d", $users);
        $reg = $year . $month . $number;

        // Create a new user instance
        $user = new User();
        
        // Populate user information
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'doctor';
        $user->rank = $request->rank;
        $user->number = $reg;
        $user->speciality = implode(',', $request->speciality);
        $user->phone = $request->contact_phone;
        $user->experience = $request->experience;
        $user->languages = implode(',', $request->languages);
        $user->folio = $request->folio;
        $user->sex = $request->sex;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->lga = $request->lga;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('login')->with('success', 'Doctor registration successful!');
    }

}
