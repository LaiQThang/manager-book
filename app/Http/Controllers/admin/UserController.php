<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private $user;
    private $permission;
    //
    public function __construct()
    {
        $this->user = new UserModel();
        $this->permission = new Permission();
    }
    public function index(Request $request){

        $users = $this->user->getAllUsers($request);
        $title = 'User list';
        
        return view('admin.users.usersList', compact('users', 'title'));
    }

    public function edit(Request $request, $id){
        $title = 'Edit user';
        $user = $this->user->getUser($id);
        $request->session()->put('id', $id);
        $permission = $this->permission->getAllPermission();
        if(!$user){
            return redirect(route('users.index'))->with('msg','Link does not exist');
        }

        return view('admin.users.userEdit', compact('title', 'user', 'permission'));
    }

    public function update(Request $request){
        $id = session('id');
        if(empty('id')){
            return back()->with('msg','Link does not exist');
        }

        $role = [
            'full_name' => 'required|min:5',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|min:6',
            'password_confirm' => 'required|min:6',
            'permission' => ['required', function($attr, $val, $fail){
                if($val==0){
                    $fail('Bắt buộc phải chọn!');
                }
            }],
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
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
            'image.image' => 'Tệp phải là ảnh',
            'image.mimes' => 'Loại ảnh không được hỗ trợ',
            'image.max' => 'Kích cỡ tối đa 2048kb',
        ];

        $request->validate($role, $message);

        if($request->password != $request->password_confirm){
            return back()->with('msg', 'The password must be the same!');
        }
        // dd($request->change_password);

        

        if(!empty($request->change_password)){
            $dataUpdate = [
                'email' => $request->email,
                'full_name' => $request->full_name,
                'password' => password_hash($request->password, PASSWORD_BCRYPT),
                'permission' => $request->permission,
                'remember_token'=> $request->_token,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }  else if(!empty($request->image)){
            $img = $this->user->getUser($id);
            Storage::delete('public/'.$img->image);

            $imageName = time().'.'.$request->image->extension();

            Storage::putFileAs('public', $request->image, $imageName);

            $dataUpdate = [
                'email' => $request->email,
                'full_name' => $request->full_name,
                'permission' => $request->permission,
                'image' => $imageName,
                'remember_token'=> $request->_token,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }else{
            $dataUpdate = [
                'email' => $request->email,
                'full_name' => $request->full_name,
                'permission' => $request->permission,
                'remember_token'=> $request->_token,
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }



        $result = $this->user->updateUser($dataUpdate, $id);

        if($result){
            return redirect()->back()->with('msg', 'Update success!');
        }

        return back()->with('msg','Link does not exist');
    }

    public function delete($id){
        $result = $this->user->deleteUser($id);

        if($result){
            return redirect(route('users.index'))->with('msg', 'Delete user success!');
        }
        return redirect(route('users.index'))->with('msg', 'Link does not exist!');
    }

    public function add(){
        $title = 'User add';

        $permission = $this->permission->getAllPermission();
        return view('admin.users.userAdd', compact('title','permission'));
    }

    public function postAdd(Request $request){
        $role = [
            'full_name' => 'required|min:5',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|min:6',
            'password_confirm' => 'required|min:6',
            'permission' => ['required', function($attr, $val, $fail){
                if($val==0){
                    $fail('Bắt buộc phải chọn!');
                }
            }],
            'image' => 'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
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
            'permission.required' => 'Bắt buộc phải chọn!',
            'image.image' => 'Tệp phải là ảnh',
            'image.mimes' => 'Loại ảnh không được hỗ trợ',
            'image.max' => 'Kích cỡ tối đa 2048kb',
        ];

        $request->validate($role, $message);

        if($request->password != $request->password_confirm){
            return back()->with('msg', 'The password must be the same!');
        }

        $imageName = time().'.'.$request->image->extension();

        Storage::putFileAs('public', $request->image, $imageName);

        // $request->image->move(public_path('images'), $imageName);

        $dataPost = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_BCRYPT),
            'permission' => $request->permission,
            'remember_token' => $request->_token,
            'image' => $imageName,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $result = $this->user->addUser($dataPost);

        if($result){
            return back()->with('msg', 'Successful!');
        }
        else{
            return back()->with('msg', 'Link does not exist!');
        }
    }
}
