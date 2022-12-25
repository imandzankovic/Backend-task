<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

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
        //$this->middleware('isLoggedIn');
        //$this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('password');
    
        $credentials = [
            'email'=>$email,
            'password'=>$pass
        ];
    
         
        $user = User::where('email', $request->email)
            ->where('password',$request->password)->first();

      if (!$token =  Auth::loginUsingId($user->id)) {
            return response()->json(['error' => 'Unauthorizedsfwe'], 401);
        }


        return Auth::user();
          
    }

    public function logout(){
        
        Session::flush();

        Auth::logout();

        // if (Session::get('loginId')){
        //     Session::pull('loginId');
        //     return redirect('login');
        // }
 
}
}
