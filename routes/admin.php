<?php

use Illuminate\Support\Facades\Route;

####  admin auth 
   ## login
      Route::get('admin-login', 'Auth\LoginController@adminLogin')->name('admin-login');

   ## register
      Route::get('admin-register', 'Auth\LoginController@adminRegister')->name('admin-register');
      Route::post('register-admin', 'Auth\LoginController@registerNewadmin')->name('register-admin');
   ## forgot_password
      Route::get('forgot_password', 'Auth\ForgotPasswordController@forgotPassword')->name('forgot_password');
      Route::post('forgot/password', 'Auth\ForgotPasswordController@submitForgot')->name('forgot.password.post');
   ## reset   
      Route::get('reset-user-password/{token}', 'Auth\ForgotPasswordController@resetUserPasswordGet')->name('reset-user-password');
      Route::post('reset-user-password', 'Auth\ForgotPasswordController@resetUserPasswordPost')->name('reset-user-password.post');

## dashboard       
   Route::group(['middleware' => 'auth', 'namespace' => 'Admin','prefix' => 'admin'], function () {        
      Route::resource('customers','CustomerController');     
   }); 