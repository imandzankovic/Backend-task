<?php

namespace App\Http\WebControllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;

class CustomAuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginUser(Request $request)
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

    Auth::user();
      if($user->is_admin == 1){
        return redirect('projects');
      }
      else{
        return redirect('tasks');
      }
   }

    public function logout(){
        
            if (Session::get('loginId')){
                Session::pull('loginId');
                return redirect('login');
            }
     
    }

}
