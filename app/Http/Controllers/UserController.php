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


    public function macroexam(){

        $url = 'http://curlphp.test/';

        $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url);
         curl_setopt($ch, CURLOPT_POST, 0);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

         $response = curl_exec ($ch);
         $err = curl_error($ch);  
         curl_close ($ch);
         // echo $response;
         $result = json_decode($response, true);

         dd($result['tds_data']);
         exit();
        $array=['taylor', 'abigail', null];
        $collection = collect($array)->map(function ($name) {
            return strtoupper($name);
        })
        ->reject(function ($name) {
            return empty($name);
        });
        
        $users=User::first();
        echo $users->created_at->toFormattedDate();
        // dd($users->created_at->toFormattedDate());
        
        User::search('name', $searchTerm)->get();

        return response()->success('Successful');

        return response()->fail('Failed!');

        dd(Str::isLength('This is a Laravel Macro', 23));

        // $user->update([
        //     'photo' => request()->file('photo')->manipulate(function (Image $image){
        //             $image->fit(400,400);
        //         })->storePublicly('avatars/users')
        // ]);
        // echo Str::isLength('This is a Laravel Macroe', 23);
    }

    public function UserLogin()
    {   
        if (Auth::user()) 
            return redirect('/');
        return view('front.user-login')->with("message", 'registered Successfully');
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
   

    public function userSignup()
    {   
        if (Auth::user()) 
            return redirect('/');
        
        return view('front.user-signup');
    }
    
    public function registerNewUser(Request $request)
    {

        if (Auth::user())
            return redirect('/');
        $this->validate(request(),[
                'name'    => 'required',
                'email'    => 'required|email',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ],
            [
                'name.required'=>'الاسم مطلوب',
                'email.required'=>' البريد  الإلكتروني مطلوب',
                'email.email'=>'يجب أن يكون من نوع بريد إلكتروني',
                'password.required'=>' كلمة المرور مطلوبة',
                'confirm_password.required'=>' يرجى إعادة كلمة المرور ',
                
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
        return redirect('login-user')->with("message", 'registered Successfully');

    }

    public function profileEdit()
    {   
        if (Auth::user()) {
            return view('front.profile');
        }else{
            return redirect('login-user');
        }
    }
    
    public function profileUpdate(Request $request)
    {
        if (Auth::user()) {
            // return redirect('login-user');    
            $userid = Auth::user();
            $edit = User::findOrFail($userid->id);
            
            $edit->name  = $request->name;
            $edit->notes  = $request->notes;
            // $edit->dateOfBirth  = $request->dateOfBirth;
                  
            if($file=$request->file('image'))
            {
                $file_extension = $request -> file('image')-> getClientOriginalExtension();
                $file_name = time().'.'.$file_extension;
                $file_nameone = $file_name;
                $path = 'img/profiles';
                $request-> file('image') ->move($path,$file_name);
                $edit->image  =$file_nameone;
            }else{
                $edit->image  = $edit->image; 
            }
            $edit->save();
            return back()->with("message", 'updated Successfully'); 
        }else{
            return redirect('login-user');
        }
        

    }

    public function changePassword()
    {   
        if (Auth::user()) {
            return view('front.change-password');
        }else{
            return redirect('login-user');
        }
    }
    

    public function updatePassword(Request $request){

        $userid = Auth::user();
        // dd($userid);
        $this->validate( $request,[          
                'current-password'=>'required',
                'new-password'=>'required',
            ],
            [
                'current-password'=>'required',
                'new-password'=>'required',
            ]
        );

        if (!(Hash::check($request->get('current-password'), $userid->password))) {
            return redirect()->back()->with("errorss","The current password does not match the password you provided. Try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("errorss","The new password cannot be the same as your current password. Please choose a different password.");
        }
        
        $userid->password = bcrypt($request->get('new-password'));
        $userid->save();
        return redirect()->back()->with("message","The password has been changed successfully!");
    }

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
