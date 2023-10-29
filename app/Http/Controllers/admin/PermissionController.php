<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Permission_item;
use App\Models\Permission_list;
use Error;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    private $permission;

    public function __construct()
    {
        $this->permission = new Permission();
    }

    public function index(){
        $title = 'Phân quyền';
        $permissions = $this->permission->getAllPermission();
        return view('admin.permission.permissionList', compact('title', 'permissions'));
    }

    public function add(){
        $title = 'Phân quyền';

        return view('admin.permission.permissionAdd', compact('title'));
    }

    public function postAdd(Request $request){

        $role = [
            'permission_id' => 'required|unique:permissions,permission_id',
            'permission_name' => 'required'
        ];

        $message = [
            'permission_id.required' => 'Trường bắt buộc nhập',
            'permission_id.unique' => 'Trường này đã tồn tại',
            'permission_name.required' => 'Trường này bắt buộc nhập'
        ];

        $request->validate($role, $message);

        $data = [
            'permission_id' => $request->permission_id,
            'permission_name' => $request->permission_name,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $result = $this->permission->postAdd($data);

        if(!empty($result)){
            return response()->json(['status' => 'success']);
        }
        else{
            return response()->json(['status' => 'err']);
        }

        return back()->with('msg', 'Liên kết không tồn tại!');

    }

    public function edit(Request $request, $id){
        $request->session()->put('id', $id);

        $permission = $this->permission->getPermission($id);

        $permission_list = Permission_list::all();
        $permission_items = Permission_item::where('permission_id', $id)->get();

        $title = 'Phân quyền';

        if(!empty($permission)){
            return view('admin.permission.permissionEdit', compact('title', 'permission', 'permission_list', 'permission_items'));
        }

        return back()->with('msg', 'Liên kết không tồn tại!');
    }

    public function update(Request $request){

        $id = session('id');
        if(empty('id')){
            return back()->with('msg','Link does not exist');
        }

        Permission_item::where('permission_id', $id)->delete();

        $list = Permission_list::all();
        $data = [];

        foreach($list as $key => $value){
            $data[$key] =  $value->id;
        }

        for ($i=0; $i <= 6; $i++) { 
            $name = 'permission_name_' . $i;
            if(!empty($request->$name)){

                // $item = Permission_item::where('permission_id', $id)
                // ->where('permission_list_id', $request->$name)
                // ->get();

                if(in_array($request->$name, $data)){
                    $result = Permission_item::create([
                        'permission_id' => $id,
                        'permission_list_id' => $request->$name
                    ]);

                    if(empty($result)){
                        return back()->with('Liên kết không tồn tại, xóa quyền! (Permission)');
                    }
                }
                else{
                    return back()->with('msg', 'Liên kết không tồn tại, xóa quyền!');
                }
            }
            
        }

        
        $role = [
            'permission_id' => 'required|unique:permissions,permission_id,'.$id,
            'permission_name' => 'required'
        ];

        $message = [
            'permission_id.required' => 'Trường bắt buộc nhập',
            'permission_id.unique' => 'Trường này đã tồn tại',
            'permission_name.required' => 'Trường này bắt buộc nhập'
        ];

        $request->validate($role, $message);

        $data = [
            'permission_id' => $request->permission_id,
            'permission_name' => $request->permission_name,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $result = $this->permission->updatePermisson($data, $id);

        if(!empty($result)){
            return back()->with('msg', 'Cập nhật thành công!');
        }

        return back()->with('msg', 'Liên kết không tồn tại!');
    }

    public function delete($id){
        $result = $this->permission->deletePermission($id);

        if(!empty($result)){
            return redirect(route('permission.index'))->with('msg', 'Xóa quyền thành công!');
        }

        return redirect(route('permission.index'))->with('msg', 'Liên kết không tồn tại!');
    }
}
