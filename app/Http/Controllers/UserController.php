<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserRepositoriesInterface;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Repositories\News\NewsRepositoriesInterface;

class UserController extends Controller
{

    protected $user;

    protected $news;

    /**
     * Create a new controller instance
     *
     * @param UserRepositoriesInterface $user
     * @param NewsRepositoriesInterface $news
     */
    public function __construct(UserRepositoriesInterface $user, NewsRepositoriesInterface $news)
    {
        $this->user = $user;
        $this->news = $news;
    }

    /**
     * view list user
     *
     * @return '/admin/user/index'
     */
    public function index()
    {
        $data = $this->user->getAll();

        return view('admin.user.list', [
            'data' => $data
        ]);
    }

    /**
     * view profile user
     *
     * @return [type] [description]
     */
    public function show()
    {
        $data = $this->user->find(Auth::id());
        $countNewsUser = $this->news->countNewsUser();
        $countNewsCheck = $this->news->countNewsCheck();

        return view('admin.user.profile', [
            'data' => $data,
            'countNewsUser' => $countNewsUser,
            'countNewsCheck' => $countNewsCheck
        ]);
    }

    /**
     * update information user
     *
     * @param Request $request
     *            [description]
     * @return [type] [description]
     */
    public function update(Request $request)
    {
        $message = "Thay đổi thành công !";
        $this->user->updateUser([
            'id' => Auth::id(),
            'user' => $request->all()
        ]);

        return redirect()->back()->with('message', $message);
    }

    /**
     * [updatePass description]
     *
     * @param Request $request
     *            [description]
     * @return [type] [description]
     */
    public function updatePass(Request $request)
    {
        if (Auth::Check()) {
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if ($validator->fails()) {
                $error = $validator->getMessageBag()->toArray();
                return redirect()->back()->with('error', $error);
            } else {
                $current_password = Auth::User()->password;
                if (Hash::check($request_data['current-password'], $current_password)) {
                    $user_id = Auth::User()->id;
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);
                    ;
                    $obj_user->save();
                    $message = "Thay đổi mật khẩu thành công !";
                    return redirect()->back()->with('message', $message);
                } else {
                    $error = array(
                        'current-password' => 'Bạn phải nhập đúng mật khẩu cũ'
                    );

                    return redirect()->back()->with('error', $error);
                }
            }
        } else {
            return redirect()->to('/');
        }
    }

    /**
     * Delete user and return message
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $message = "Xóa thành công !";
        $this->user->destroyUser([
            'id_user' => $request->user_id
        ]);

        return redirect()->back()->with('message', $message);
    }

    /**
     * Update user image and return message
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateImg(Request $request)
    {
        $message = "Thay đổi thành công !";
        $this->user->uploadImage([
            'id' => Auth::id()
        ], $request);

        return redirect()->back()->with('message', $message);
    }

    /**
     * Validator for change password fuction
     *
     * @param array $data
     * @return unknown
     */
    public function admin_credential_rules(array $data)
    {
        $messages = [
            'current-password.required' => 'Bạn phải nhập mật khẩu cũ',
            'password.required' => 'Bạn phải nhập mật khẩu'
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password'
        ], $messages);

        return $validator;
    }
}
