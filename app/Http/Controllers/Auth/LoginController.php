<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Exception;
use App\User;

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
    protected $redirectTo = '/profileTutor';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
     public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function redirectToFaceBook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFaceBookCallback()
    {
      
  
            $user = Socialite::driver('facebook')->user();
            return  $user->email;
       
    }
   
    public function handleGoogleCallback()
    {
        try {
  
            $user = Socialite::driver('google')->user();
            return  $user->email;
   
            $finduser = User::where('google_id', $user->id)->first();
   
            if($finduser){
   
                Auth::login($finduser);
  
                 return redirect('/home');
   
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id
                ]);
  
                Auth::login($newUser);
   
                return redirect()->back();
            }
  
        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }
}
