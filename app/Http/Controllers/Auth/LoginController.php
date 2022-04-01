<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request){
       $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
            ]);
        $email = $request->email;
        $password = $request->password;
        $validData = User::where('email', $email)->first();
        $password_check = password_verify($password, @$validData->password);
      if ($password_check == false) {
         return redirect()->back()->with('message', 'Email or password does not matcc!');
      }
      if ($validData->status == '0') {
        return redirect()->back()->with('message', 'sorry you are not varify yet!');
      }
      if (Auth::attempt(['email'=>$email, 'password'=>$password])) {
        return redirect()->route('login');
      }
    }

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
