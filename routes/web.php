<?php

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
    return view('welcome');
});


Route::get('encode/{string}', function($string){
    return response()->bEncode($string);
});


Route::get('macroexam', 'UserController@macroexam');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('login-user', 'UserController@UserLogin')->name('loginusers');
Route::post('login-user', 'UserController@LoginUser')->name('login-user');

Route::get('user-profile-edit', 'UserController@profileEdit');
Route::post('user-profile-update', 'UserController@profileUpdate')->name('user-profile-update');


Route::get('user-signup', 'UserController@userSignup');
Route::post('user-signup', 'UserController@registerNewUser')->name('user-signup');

Route::post('signoutinstructors', 'UserController@signOutInstructors')->name('signoutinstructors');

Route::get('change-password', 'UserController@changePassword');
Route::post('user-change-password', 'UserController@updatePassword')->name('user-change-password');


Route::get('send-mail', function () {
   
    $details = [
        'title' => 'Mail from hamada ali',
        'body' => 'This is for testing email using smtp'
    ];
   
    \Mail::to('hamadaali889900@gmail.com')->send(new \App\Mail\MyTestMail($details));
   
    dd("Email is Sent.");
});

Route::get('forgot_password', 'UserController@forgotPassword');
Route::post('forgot/password', 'UserController@submitForgot')->name('forgot.password.post');
        
Route::get('reset-user-password/{token}', 'UserController@resetUserPasswordGet')->name('reset-user-password');
Route::post('reset-user-password', 'UserController@resetUserPasswordPost')->name('reset-user-password.post');
        