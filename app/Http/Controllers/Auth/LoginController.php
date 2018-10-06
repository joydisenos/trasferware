<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Message;

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
    protected $redirectTo = '/home';

    protected function sendLoginResponse(Request $request) {
        if($this->guard()->user()->status_id == 0) {
            $this->guard()->logout();
            return redirect()->back() ->withInput($request->only($this->username(), 'remember')) ->withErrors(['active' => 'Tu estado es <strong>inactivo</strong>, consulte al administrador.']);
        }
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        
        $autenticado = $this->authenticated($request, $this->guard()->user());
        if($autenticado){
            return;
        }else{
            $nromensajes = Message::where('leido', '=', 0)->where('recipient_id','=',\Auth::id())->count();
            session(['nromensajes' => $nromensajes]);
            return redirect()->intended($this->redirectPath());
        }
    }

    public function username()
    {
        return 'name';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
