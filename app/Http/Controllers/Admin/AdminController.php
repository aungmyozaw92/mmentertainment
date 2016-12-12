<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;


class AdminController extends Controller
{
   
   public function index()
    {
        if(Auth::check()){
            return redirect('admin/dashboard');
        }
        else{
            return view('admin.auth.login');
        }
    }

    public function postSignIn(LoginRequest $request){

        $credentials =
           [
               'username'    => $request->username,
               'password'    => $request->password,
           ];

        if (Auth::attempt($credentials))
            {   
                Session::flash('message', 'Welcome Dashboard ! Login successfully');
                return redirect('admin/dashboard');
            }

        return redirect('admin')->withErrors(['username' => 'The credentials you entered did not match .',]);
    }

    public function recover_password(PasswordRequest $request) 
    {
        $user = User::where('email', '=', $request->input('email'));
        if($user->count() == 1) {
            $user = $user->first();
                            //generate code
            $code                 = str_random(60);
            $password             = str_random(10);
            $user->code           = $code;
            $user->password_temp  = Hash::make($password);
            if($user->save()) {
                Mail::send('forgetpassword', array(
                    'link' => URL::to('admin/getRecover').'/'.$code,
                    'username' => $user->username,
                    'password' => $password),
                function($message) use ($user) {
                    $message->to($user->email, $user->username)->subject('Your new password has been reset.');
                });
                return "Your password reset mail had been sent.";
            }
        }
        else{
            return "Can't found your email in Our system ! ";
        }


      
        
    }
    // end recover password
    public function getRecover($code) 
    {
        $user = User::where('code', '=', $code)
                            ->where('password_temp', '!=', '');

        if($user->count()) {
                $user = $user->first();

                $user->password       = $user->password_temp;
                $user->password_temp  = '';
                $user->code           = '';

                if ($user->save()) {
                        return redirect()->to('/admin')
                         ->with('message', 'Your account has been recover and you can sign in with new password');
                }
        }
        return redirect()->to('/admin')
            ->with('message', 'Could not recover your account');
    }

    public function logout() {

        Auth::logout();
        return redirect('/admin');

    }
}
