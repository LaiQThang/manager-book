<?php

namespace App\Http\Controllers\admin;

use App\Heplers\Function\SendMail;
use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class LoginController extends Controller
{
    //
    private $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }
    

    public function index(){
        return view('admin.authentic.login');
    }

    public function login(Request $request){
        $user = $this->user->getUserLogin($request);
        if(!empty($user)){
           if(password_verify($request->password, $user->password)){
            $_SESSION['userLogin'] = $user->remember_token;
            $_SESSION['VERSION_USER'] = $user->id;
            return redirect(route('admin.index'));
           }
           else{
            return back()->with('msg', 'Incorrect password!');
           }
        }
        else{
            return back()->with('msg','Account does not exist!');
        }
    }

    public function register(Request $request){

        $role = [
            'full_name' => 'required|min:5',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|min:6',
            'password_confirm' => 'required|min:6',
        ];

        $message = [
            'full_name.required' => "Họ và tên bắt buộc phải nhập",
            'full_name.min' => 'Họ và tên phải từ :min kí tự trở lên',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => "Email không đúng định dạng",
            'password.required' => 'Password bắt buộc phải nhập',
            'password.min' => 'Password tối thiếu :min kí tự',
            'password_confirm.required' => 'Password bắt buộc phải nhập',
            'password_confirm.min' => 'Password tối thiếu :min kí tự',
            'email.unique' => 'Email đã tồn tại',
            'group_id.required' => 'Bắt buộc phải chọn nhóm',
        ];

        $request->validate($role, $message);

        if($request->password != $request->password_confirm){
            return back()->with('msg', 'The password must be the same!');
        }

        $token = $this->user->getToken();

        $dataAdd = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_BCRYPT),
            'remember_token' => $token,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        dd($request->all());

        $user = $this->user->addUser($dataAdd);
        if(!empty($user)){
            $name = $request->full_name;

            $data = ['name' => $name, 'token' => $token];
            
            try {
                //code...
                SendMail::FlyMail('admin.sendMail.verifyAccount', $data, 'Verify account', $request->email, $name);
                return back()->with('msg','Register success! Check your email and verify to login!');
            } catch (\Throwable $th) {
                $this->user->rollBackUser($token);
                //throw $th;
                return back()->with('msg', 'Link does not exist!');
            }

            // Mail::send('admin.sendMail.verifyAccount', compact('name', 'token'), function($email) use ($name, $request){
            // $email->subject("Verify account");
            // $email->to($request->email, $name);
        // });
        }
        else{
            return back()->with('msg', 'Link does not exist!');
        }
    }

    public function updatePermission($token){
        $result = $this->user->updatePermission($token);

        if(!empty($result)){
            return redirect(route('auth.index'))->with('msg', 'Verify account successful!');
        }
        else{
            return redirect(route('auth.index'))->with('msg', 'Link does not exist!');
        }
    }
}
