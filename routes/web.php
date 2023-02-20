<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(auth()->check()){
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin.home');
        }
        if(Auth::user()->role == 'patient'){
            return redirect()->route('patient.home');
        }
        if(Auth::user()->role == 'doctor'){
            return redirect()->route('doctor.home');
        }
        if(Auth::user()->role == 'pending'){
            return redirect()->route('pending.home');
        }
    };
    $data['doctors'] = User::where('role','doctor')->where('status',1)->where('featured',1)->get();
    return view('front.index',$data);

})->name('homepage');


Route::get('/about-us', [PagesController::class, 'about'])->name('about');
Route::get('/featured-doctors', [PagesController::class, 'doctors'])->name('doctors');
Route::get('/contact-us', [PagesController::class, 'contact'])->name('contact');

Route::get('/speciality', [PagesController::class, 'speciality'])->name('speciality');

Route::get('/terms', function(){
    return view('front.terms');
})->name('terms');

Route::get('/chats', function () {
    return view('test');
})->name('chats');


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/password/forgot', [ForgotPasswordController::class, 'index'])->name('password.forgot');
Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'resetForm'])->name('reset.password');
Route::post('/password/forgot', [ForgotPasswordController::class, 'sendEmail']);
Route::post('/password/reset/reset', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password.reset');

// Route::get('/change/password', [ChangepasswordController::class, 'index'])->name('change.password');
// Route::post('/change/password', [ChangepasswordController::class, 'change']);

Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('/home', [HomeController::class, 'admin'])->name('admin.home');
});

Route::group(['prefix' => 'home', 'middleware' => ['auth']], function(){
    Route::get('/patient', [HomeController::class, 'patient'])->name('patient.home');
    Route::get('/doctor', [HomeController::class, 'doctor'])->name('doctor.home');
});




Route::group(['prefix' => '', 'middleware' => ['auth']], function(){

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/userList', [App\Http\Controllers\MessageController::class, 'userlist'])->name('userList');
    Route::get('/usermessage/{id}', [App\Http\Controllers\MessageController::class, 'user_message'])->name('usermessage');
    Route::post('sendmessage', [App\Http\Controllers\MessageController::class, 'send_message'])->name('user.message.send');

    Route::get('/profile/{id}', [App\Http\Controllers\PatientProfileController::class, 'index'])->name('profile');
    Route::get('/profile/settings/{id}', [App\Http\Controllers\PatientProfileController::class, 'settings'])->name('profile.settings');

    Route::post('/profile', [App\Http\Controllers\PatientProfileController::class, 'update'])->name('profile');

    Route::get('/doctor/application', [App\Http\Controllers\DoctorApplicationController::class, 'index'])->name('doctor.apply');
Route::post('/doctor/application', [App\Http\Controllers\DoctorApplicationController::class, 'save']);

});


Route::group(['prefix' => 'users', 'middleware' => ['auth','admin']], function(){

    Route::get('/applications', [App\Http\Controllers\UsersController::class, 'applicationsIndex'])->name('doctors.applications');
    Route::get('/doctors', [App\Http\Controllers\UsersController::class, 'doctorsIndex'])->name('users.doctors.index');
    Route::get('/patients', [App\Http\Controllers\UsersController::class, 'patientsIndex'])->name('users.patients.index');
    Route::get('/admins', [App\Http\Controllers\UsersController::class, 'adminsIndex'])->name('users.admins.index');
    Route::get('/doctors/applications/submit/{id}', [App\Http\Controllers\UsersController::class, 'ApproveRequest'])->name('doctors.applications.submit');

    Route::get('/feature/{id}', [App\Http\Controllers\UsersController::class, 'featureDoctors'])->name('feature');

    Route::post('/doctors/delete', [App\Http\Controllers\UsersController::class, 'doctorsDelete'])->name('doctors.delete');
    Route::post('/doctors/suspend', [App\Http\Controllers\UsersController::class, 'doctorsSuspend'])->name('doctors.suspend');
    Route::post('/doctors/reject', [App\Http\Controllers\UsersController::class, 'doctorsReject'])->name('doctors.reject');



});



// Route::get('/doctor/profile/{number}', [App\Http\Controllers\PatientController::class, 'DoctorsDetails'])->name('doctors.details');

//patient routes
Route::group(['prefix' => 'patient', 'middleware' => ['auth']], function(){

    Route::get('/doctors', [App\Http\Controllers\PatientController::class, 'DoctorsIndex'])->name('doctors.index');
    Route::post('/doctors', [App\Http\Controllers\PatientController::class, 'sortBookings'])->name('doctors.index');
    Route::get('/doctors/details/{number}', [App\Http\Controllers\PatientController::class, 'DoctorsDetails'])->name('doctors.details');

    Route::post('/book', [App\Http\Controllers\PatientController::class, 'BookDoctor'])->name('book');
    Route::get('/reservations', [App\Http\Controllers\PatientController::class, 'MyReservations'])->name('reservations');
    Route::post('/reservations', [App\Http\Controllers\PatientController::class, 'PreFormSave'])->name('reservations');
    Route::get('/wallet', [App\Http\Controllers\WalletController::class, 'index'])->name('wallet');

    Route::get('/prescription/download/{id}', [App\Http\Controllers\PatientController::class, 'download'])->name('download');

    Route::post('/cancel_booking', [App\Http\Controllers\PatientController::class, 'cancelBooking'])->name('booking.cancel');
    Route::post('/adjust_booking', [App\Http\Controllers\PatientController::class, 'adjustBooking'])->name('booking.adjust');
    Route::post('/change_booking', [App\Http\Controllers\PatientController::class, 'changeBooking'])->name('booking.change_book');

});

Route::post('/pay', [App\Http\Controllers\WalletController::class, 'redirectToGateway'])->name('pay')->middleware('auth');
Route::get('/payment/callback', [App\Http\Controllers\WalletController::class, 'handleGatewayCallback'])->middleware('auth');

//doctor routes
Route::group(['prefix' => 'doctor', 'middleware' => ['auth']], function(){

    Route::get('/schedules', [App\Http\Controllers\DoctorController::class, 'SchedulesIndex'])->name('doctors.schedules');
    Route::post('/schedules', [App\Http\Controllers\DoctorController::class, 'SchedulesStore'])->name('doctors.schedules');
    Route::get('/profile', [App\Http\Controllers\DoctorController::class, 'ProfileIndex'])->name('doctors.profile');
    Route::get('/profile/settings', [App\Http\Controllers\DoctorController::class, 'SettingsIndex'])->name('doctors.profile.settings');
    Route::post('/profile/settings', [App\Http\Controllers\DoctorController::class, 'SettingsStore']);
    Route::get('/patients', [App\Http\Controllers\DoctorController::class, 'MyPatients'])->name('doctor.patients');
    Route::post('/patients', [App\Http\Controllers\DoctorController::class, 'sortPatients'])->name('doctor.patients');
    Route::get('/patients/mark_complete/{id}', [App\Http\Controllers\DoctorController::class, 'markComplete'])->name('doctor.patients.complete');
    Route::post('/patients/appoint_time', [App\Http\Controllers\DoctorController::class, 'appointTime'])->name('doctor.patients.time');
    Route::get('/chat/patients', [App\Http\Controllers\DoctorController::class, 'Chat'])->name('doctor.chat');

    Route::post('/link', [App\Http\Controllers\DoctorController::class, 'link'])->name('link');
    Route::post('/prescription', [App\Http\Controllers\DoctorController::class, 'prescription'])->name('prescription');

});


//get routes
Route::get('/get-data', [App\Http\Controllers\PatientController::class, 'GetData'])->name('get-data');

Route::get('/logs/index', [LoginController::class, 'logs'])->name('logs.index')->middleware(['auth','admin']);
