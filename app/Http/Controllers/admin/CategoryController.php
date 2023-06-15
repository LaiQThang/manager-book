<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Classify;
use GuzzleHttp\Promise\Promise;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    private $classify;

    public function __construct()
    {
        $this->classify = new Classify();
    }
    public function index(){
        $title = 'Danh mục sản phẩm';

        $categories = Category::all();

        // $result = Classify::addSelect(['*' => Category::select('category_name')
        // ->whereColumn('classifies.classify_id', 'id_category')
        // ->limit(1)
        //     ])->get();

        $classifies = $this->classify->getJoinCate();

        return view('admin.products.categoryList', compact('title', 'categories', 'classifies'));
    }

    public function add(){
        $title = 'Thêm danh mục';
        $categories = Category::all();
        
        return view('admin.products.categoryAdd', compact('title', 'categories'));
    }

    public function postAdd(Request $request){

        $categories = Category::all();
        
        $data = [];
        foreach($categories as $key => $item){
            $data[$key] = $item->id_category;
        }

        $role = [
            'category_name' => 'required',
            'category_cre' => 'integer'
        ];

        $message = [
            'category_name.required' => 'Trường bắt buộc nhập',
            'category_cre.integer' => 'Lỗi !',
        ];

        $request->validate($role, $message);

        if($request->category_cre !== 0 && in_array($request->category_cre, $data)){
            $classify = Classify::create([
                'classify_name' => $request->category_name,
                'category_id' => $request->category_cre,
            ]);

            if(!empty($classify)){
                return back()->with('msg', 'Thêm thành công');
            }
            return back()->with('msg', 'Liên kết không tồn tại!');
        }
        if($request->category_cre == 0){
            $category = Category::create([
                'category_name' => $request->category_name,
            ]);

            if(!empty($category)){
                return back()->with('msg', 'Thêm thành công');
            }
            return back()->with('msg', 'Liên kết không tồn tại!');
        }
        return back()->with('msg', 'Liên kết không tồn tại!');
    }

    public function edit(Request $request, $id){
        $title = 'Danh mục sản phẩm';

        $request->session()->put('idCate', $id);

        $getCate = Category::find($id);

        return view('admin.products.categoryEdit', compact('title', 'getCate'));
    }

    public function update(Request $request){
        $id = session('idCate');

        $role = [
            'category_name' => 'required',
            'category_cre' => 'integer'
        ];

        $message = [
            'category_name.required' => 'Trường bắt buộc nhập',
            'category_cre.integer' => 'Lỗi !',
        ];

        $request->validate($role, $message);

        if(!empty($id)){
            if($request->category_cre == 0){
                $cate = Category::find($id);
 
                $cate->category_name = $request->category_name;
                
                $cate->save();

                return back()->with('msg', 'Cập nhật thành công!');
            }
            else if($request->category_cre != 0){
                Classify::create([
                    'classify_name' => $request->category_name,
                    'category_id' => $request->category_cre,
                ]);

                return back()->with('msg', 'Cập nhật thành công!');
            }
            else{
                return back()->with('msg', 'Liên kết không tồn tại!');
            }
        }
        else{
            return back()->with('msg', 'Liên kết không tồn tại!');
        }
    }

    
    public function editClassify(Request $request, $id){
        $title = 'Danh mục sản phẩm';

        $request->session()->put('idClassify', $id);

        $getClassify = $this->classify->getJoinClassify($id);

        return view('admin.products.categoryEdit', compact('title', 'getClassify'));
    }

    public function updateClassify(Request $request){
        $id = session('idClassify');
        if(!empty($id)){
            if($request->category_cre != 0){
                $classify = Classify::find($id);
 
                $classify->classify_name = $request->category_name;
                $classify->category_id = $request->category_cre;
                
                $classify->save();

                return back()->with('msg', 'Cập nhật thành công!');
            }
            else if($request->category_cre == 0){
                Category::create([
                    'category_name' => $request->category_name,
                ]);

                return back()->with('msg', 'Cập nhật thành công!');
            }
            else{
                return back()->with('msg', 'Liên kết không tồn tại!');
            }
        }else{
            return back()->with('msg', 'Liên kết không tồn tại!');
        }
    }

    public function delete($id){
        
        $classify = Classify::where('category_id', $id)->delete();

        if(!empty($classify)){
            Category::destroy($id);
            return back()->with('msg', 'Xóa thành công!');
        }else{
            return back()->with('msg','Liên kết không tồn tại!');
        }
    }

    public function deleteClassify($id){

        $classify = Classify::destroy($id);

        if(!empty($classify)){
            return back()->with('msg', 'Xóa thành công!');
        }else{
            return back()->with('msg','Liên kết không tồn tại!');
        }
    }

    
}
