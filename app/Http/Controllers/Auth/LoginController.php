<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/dashboard-home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt(['email' => $request->email , 'password' => $request->password]))
        
        return auth()->user()->isAdmin ? redirect()->route('dashboard.home') : redirect()->route('website.home');
        

        $user = User::where('email' , $request->email)->first();
        
        $oldEmail = $request->email;
        
        return ($user) 
            ? view('auth.login' ,compact('oldEmail'))->withErrors(['password' => 'كلمة المرور خاطئة'])
            : view('auth.login' ,compact('oldEmail'))->withErrors(['email' => 'هذا البريد الإلكتروني غير موجود']);
    }
}
