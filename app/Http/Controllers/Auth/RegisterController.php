<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\BrevoAPIKey;
use App\Models\ReservedAccount;
use App\Models\User;
use App\Models\Wallet;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

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
            'password' => Hash::make($validatedData['password']),
        ]);

        $this->sendWelcomeEmail($fullName, $validatedData['email']);

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

    public function registerStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();
        $fullName = $validatedData['first_name'] . ' ' . $validatedData['last_name'];
        $firstName = explode(' ', $fullName)[0];
        $randomString = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 4);
        $username = $firstName . $randomString;
        
        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'username' => $username,
            'password' => Hash::make($validatedData['password']),
        ]);

        $this->sendWelcomeEmail($fullName, $validatedData['email']);

        return response()->json([
            'status' => 200,
            'message' => 'Registration successful',
        ]);

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
        $this->validate($request, [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'rank' => 'required',
            'speciality' => 'required|array',
            'experience' => 'required',
            'languages' => 'required|array',
            'folio' => 'required',
            'sex' => 'required',
            'address' => 'required',
            'state' => 'required',
            'lga' => 'required',
            'password' => 'required|min:8|confirmed',
            'passport' => 'required|image|mimes:jpeg,png,jpg,gif|max:400',
            'certificate' => 'required|image|mimes:jpeg,png,jpg,gif|max:1500',
        ]);

        // Create a new user instance
        $user = new User();

        // Populate user information
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->role = 'doctor';
        $user->rank = $request->rank;
        $user->speciality = implode(',', $request->speciality);
        $user->phone = $request->phone;
        $user->experience = $request->experience;
        $user->languages = implode(',', $request->languages);
        $user->folio = $request->folio;
        $user->sex = $request->sex;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->lga = $request->lga;
        $user->password = Hash::make($request->password);

        if ($request->file('passport') != null) {

            $file = $request->file('passport');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/avatar', $filename);
            $user->picture = $filename;
        }

        if ($request->file('certificate') != null) {

            $file = $request->file('certificate');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '2.' . $extension;
            $file->move('uploads/certificates', $filename);
            $user->certificate = $filename;
        }

        $user->save();

        return redirect()->route('login')->with('success', 'Doctor registration successful! Please login below.');
    }

    private function sendWelcomeEmail($name, $email)
    {

        $apiKey = BrevoAPIKey::first()->secret_key ?? '';

        $endpoint = 'https://api.brevo.com/v3/smtp/email';

        // Email data
        $senderName = 'ChatDoc';
        $senderEmail = 'support@chatdoct.com';
        $recipientName = $name;
        $recipientEmail = $email;
        $subject = 'Welcome to ChatDoc!';

        $htmlContent = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome to ChatDoc!</title>
        <style>
            /* Add your custom styles here */
            body {
                font-family: Arial, sans-serif;
                background-color: #f7f7f7;
                margin: 0;
                padding: 0;
                line-height: 1.6;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
            .logo img {
                max-width: 150px;
                height: auto;
            }
            .social-media {
                margin-top: 20px;
            }
            .social-media a {
                display: inline-block;
                margin-right: 10px;
            }
            .message {
                margin-top: 30px;
            }
            .message p {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="logo">
                <img src="https://chatdoct.com/uploads/logo.jpg" alt="ChatDoc Logo">
            </div>
            <div class="social-media">
                <a href="https://facebook.com/chatdoc" target="_blank">Facebook</a>
                <a href="https://twitter.com/chatdoc" target="_blank">Twitter</a>
                <a href="https://instagram.com/chatdoc" target="_blank">Instagram</a>
            </div>
            <div class="message">
                <p>Hello ' . $recipientName . ',</p>
                <p>Welcome to ChatDoc, where you can chat with qualified doctors in Nigeria and get medical assistance.</p>
                <p>Feel free to reach out to us on social media or reply to this email if you have any questions.</p>
                <p>Best regards,<br>Your ChatDoc Team</p>
            </div>
        </div>
    </body>
    </html>';

        // Prepare the data payload
        $data = [
            'sender' => [
                'name' => $senderName,
                'email' => $senderEmail,
            ],
            'to' => [
                [
                    'email' => $recipientEmail,
                    'name' => $recipientName,
                ],
            ],
            'subject' => $subject,
            'htmlContent' => $htmlContent,
        ];

        // Send the HTTP request
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'api-key' => $apiKey,
            'content-type' => 'application/json',
        ])->post($endpoint, $data);       

    }

}
