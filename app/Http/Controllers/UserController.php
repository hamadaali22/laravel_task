<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\User;
use DB;
use Crypt;

use Hash;

use Mail;
use Session;
use Auth;
// use Date;
class UserController extends Controller
{
    
    public function forgotPassword()
    {   
        return view('front.forgetpassword');
    }

    public function submitForgot(Request $request)
    {
      // dd('iughiu');
          $request->validate([
              'email' => 'required|email|exists:instructors',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
          ]);
  
          Mail::send('emails.forgetpassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });   

        $details = [
            'title' => 'Mail from hamada ali',
            'body' => 'This is for testing email using smtp',
            'token' => $token, 
        ];
       
        \Mail::to($request->email)->send(new \App\Mail\MyTestMail($details));
       
        dd("Email is Sent.");  

        return back()->with('message', 'We have e-mailed your password reset link! ');
        
    }
    public function resetUserPasswordGet($token) { 
         return view('auth.forgetpasswordlink', ['token' => $token]);
    }

    public function resetUserPasswordPost(Request $request)
    {
          $request->validate([
              'password' => 'required|string|min:3|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_resets')->where([
                                // 'email' => $request->email, 
                                'token' => $request->token
                              ])->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
          $user = User::where('email', $updatePassword->email)->first();
          // $user->email  = $request->email;   
          $user->password  = bcrypt($request->password); 
          $user-> save();
          // $user = Instructor::where('email', $request->email)
          //             ->update(['password' => Hash::make($request->password)]);
 

          DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();
          if(session()->get('locale')){
              $langg=session()->get('locale');
          }else{
              $langg=app()->getLocale();
          }

         

            return redirect('login-user')->with('message', 'Your password has been changed! ');
          
    }

     public function signOutInstructors() {
       Auth::logout();
        return redirect('/login-user');
    }
   

    
    
    
    
    
}

// <?php

// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\AuthenticatesUsers;
// use Illuminate\Http\Request;
// use Illuminate\Support\Str;
// use App\User;
// use DB;
// use Crypt;

// use Hash;

// use Mail;
// use Session;
// use Auth;

// class UserController extends Controller
// {
    
    
   
   
    
// }
