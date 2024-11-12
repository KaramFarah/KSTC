<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    public function reset(Request $request){
        
        $request->validate([
            'old_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);

        $email = auth()->user()->email;

        if(auth()->attempt(['email' => $email , 'password' => $request->old_password])){
            
            if($request->password === $request->password_confirmation){

                $this->resetPassword(auth()->user() , $request->password);

                return redirect()->back()->with(['success' => 'تم تعديل كلمة المرور بنجاح']);
            }

            return redirect()->back()->with(['password_confirmation' => 'كلمة المرور غير متطابقة' , 'danger' => 'حدث خطأ ما!']);
            
        }

        $user = User::where('email' , $email)->first();
        
        return (isset($user)) 
            ?  redirect()->back()->with(['old_password' => 'كلمة المرور خاطئة' , 'danger' => 'حدث خطأ ما!'])
            :  redirect()->back()->with(['email' => 'هذا البريد الإلكتروني غير موجود' , 'danger' => 'حدث خطأ ما!']);
    }


    protected function resetPassword($user, $password)
    {
        $this->setUserPassword($user, $password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        $this->guard()->login($user);
    }

    protected function setUserPassword($user, $password)
    {
        $user->password = Hash::make($password);
    }
}
