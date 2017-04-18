<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\RegisterRequest;
use App\Repositories\User\UserRepositoriesInterface;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $user;

    public function __construct(UserRepositoriesInterface $user)
    {
        $this->middleware('guest');
        $this->user = $user;
    }

    /**
     * Return the view for register function
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getRegister()
    {
        return view('admin.register');
    }

    /**
     * Do the action register new user
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postRegister(RegisterRequest $request)
    {
        $this->user->createUser($request);
        return redirect()->route('login')->with(['success' => 'Đăng ký thành công, vui lòng đăng nhập.']);
    }
}
