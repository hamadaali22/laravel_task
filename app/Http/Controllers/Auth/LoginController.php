<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;




use App\User;
use DB;
use Crypt;

use Hash;

use Mail;
use Session;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }
    public function adminLogin()
    {
        if (Auth::user())
            return redirect('/');
        return view('admin.login');
    }

    public function signOut() {
      Auth::logout();
      return redirect('/');
    }








    public function LoginUser(request $request)
    {
        $this->validate(request(),[
            'email'    => 'required',
            'password' => 'required',
            ],
            [
                'email.required'=>' البريد  الإلكتروني مطلوب',
                'password.required'=>' كلمة المرور مطلوبة',
            ]
        );

        $credentials = $request -> only(['email','password']);
        $checkinstructor = User::where("email" , $request->email)->first();


        if(auth()->attempt($credentials))
        {
            return redirect('/')->with("message", 'login Successfully');
        }else{
             return redirect('login-user')->with("errorss", 'rLogin details are not valid');
        }



    }


    public function adminRegister()
    {
        if (Auth::user())
            return redirect('/');

        return view('admin.register');
    }

    public function registerNewadmin(Request $request)
    {

        if (Auth::user())
            return redirect('/');
        $this->validate(request(),[
                'name'    => 'required',
                'email'    => 'required|email',
                'password' => 'required',
                'password_confirmation' => 'required|same:password',
            ],
            [
                'name.required'=>'الاسم مطلوب',
                'email.required'=>' البريد  الإلكتروني مطلوب',
                'email.email'=>'يجب أن يكون من نوع بريد إلكتروني',
                'password.required'=>' كلمة المرور مطلوبة',
                'password_confirmation.required'=>' يرجى إعادة كلمة المرور ',
                'password_confirmation.same'=>'كلمة المرور غير متساوية',

            ]
        );
        $checkemail = User::where("email" , $request->email)->first();
        if($checkemail){
            return back()->with("errorss", 'Email already exists');
        }else{
            $add = new User();
            $add->name  = $request->name;
            $add->email  = $request->email;
            $add->password  = bcrypt($request->password);
            $add->save();
        }
        return redirect('admin-register')->with("message", 'تم التسجيل بنجاح');

    }
}
