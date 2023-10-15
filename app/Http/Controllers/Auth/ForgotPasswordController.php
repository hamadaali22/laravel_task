<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use DB;
use Crypt;
use Hash;
use Mail;
use Session;
use Auth;
use Carbon\Carbon;
class ForgotPasswordController extends Controller
{
  use SendsPasswordResetEmails;

  public function forgotPassword()
  {
    return view('auth.forgetpassword');
  }

  public function submitForgot(Request $request)
  {
      $this->validate(request(),[
        'email'    => 'required|email',
      ],
      [
        'email.required'=>' البريد  الإلكتروني مطلوب',
        'email.email'=>'خطأ في كتابة الاميل',
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
      return back()->with('message', 'لقد أرسلنا عبر البريد الإلكتروني رابط إعادة تعيين كلمة المرور الخاصة بك! ');
  }
  public function resetUserPasswordGet($token) {
    return view('auth.forgetpasswordlink', ['token' => $token]);
  }

  public function resetUserPasswordPost(Request $request)
  {
        $this->validate(request(),[
          'password' => 'required',
          'password_confirmation' => 'required|same:password',
        ],
        [
          'password.required'=>' كلمة المرور مطلوبة',
          'password_confirmation.required'=>' يرجى إعادة كلمة المرور ',
          'password_confirmation.same'=>'تأكيد كلمة المرور غير متطابق.',
        ]);

        $updatePassword = DB::table('password_resets')->where([
        // 'email' => $request->email,
        'token' => $request->token
        ])->first();
        // dd($updatePassword);
        if(!$updatePassword){
          return back()->withInput()->with('error', 'Invalid token!');
        }
        $user = User::where('email', $updatePassword->email)->first();
        // dd($user);
        // $user->email  = $request->email;
        $user->password  = bcrypt($request->password);
        $user-> save();

        DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();
        if(session()->get('locale')){
          $langg=session()->get('locale');
        }else{
          $langg=app()->getLocale();
        }
        return redirect('admin-login')->with('message', 'تم تغيير كلمة السر الخاصة بك! ');
    }

    public function signOutInstructors() {
      Auth::logout();
      return redirect('/login-user');
    }
}
