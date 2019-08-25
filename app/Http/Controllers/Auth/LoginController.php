<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username() {
        $identity = request()->get('identity');
        $field_name = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$field_name => $identity]);

        return $field_name;
    }

    protected function validateLogin(Request $request) {
        $this->validate(
            $request, 
            [
                'identity' => 'required|string',
                'password' => 'required|string'
            ],
            [
                'identity.required' => 'Username or Email is required',
                'password.required' => 'Password is required'
            ]
        );
    }

    protected function sendFailedLoginResponse(Request $request) {
        $request->session()->flash('login_error', trans('auth.failed'));
        throw ValidationException::withMessages([
            'error' => [trans('auth.failed')]
        ]);
    }

}

