<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Show login form.
     *
     * @return void
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Handle an authentication attempt.
     * @param  Request $request
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $email    = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended($this->redirectTo);
        }

        $notice = [
            'alert' => 'danger',
            'message' => 'Verifique os dados inseridos'
        ];

        return redirect()->back()->with('notice', $notice);
    }

    /**
     * Handle a logout.
     *
     * @return Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->to('login');
    }
}
