<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';

    /**
     * Where to redirect users after logout
     *
     * @var string
     */
    protected $redirectAfterLogout = '/login';

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
     * Return the view for login function
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getLogin()
    {
        return view('admin.login');
    }

    /**
     * Do the action login for user
     *
     * @param LoginRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($login, true)) {
            return redirect(route('admin.home'));
        }
        else {
            return redirect()->back()->with(['err' => 'Thông tin đăng nhập không hợp lệ, vui lòng đăng nhập lại.']);
        }
    }

    /**
     * Do the action logout, user will be logged out
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect($this->redirectAfterLogout);
    }
}
