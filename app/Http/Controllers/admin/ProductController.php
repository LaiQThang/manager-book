<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classify;
use App\Models\Product;
use App\Models\Product_image;
use App\Models\Product_infor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    //
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    public function index(){
        $title = 'Danh sách sản phẩm';

        $products = Cache::remember('products', 60 , function () {
            return Product::addSelect([
               'classify_name' => Classify::select('classify_name')
               ->whereColumn('classify_id', 'products.classify_id')
               ->limit(1)
           ])->get();
        });

        return view('admin.product_item.itemList', compact('title', 'products'));
    }

    public function add(){
        $title = 'Thêm sản phẩm';

        $classifies = Classify::all();

        return view('admin.product_item.itemAdd', compact('title', 'classifies'));
    }

    public function postAdd(Request $request){

        $role = [
            'product_name' => 'required',
            'product_code' => 'required|unique:products,product_code',
            'product_price' => 'required|integer',
            'classify_id' => ['required', 'integer', function($attr, $val, $fail){
                if($val==0){
                    $fail('Bạn chưa chọn danh mục sản phẩm!');
                }
            }],
            'product_size_0' => 'required',
            'product_size_1' => 'required',
            'product_size_2' => 'required',
            'product_size_3' => 'required',
            'product_quantity_0' => 'required|integer',
            'product_quantity_1' => 'required|integer',
            'product_quantity_2' => 'required|integer',
            'product_quantity_3' => 'required|integer',
            'product_img_0' => 'required',
            'product_des' => 'required'
        ];

        $message = [
            'product_name.required' => 'Bạn chưa nhập tên sản phẩm!',
            'product_code.required' => 'Bạn chưa nhập mã sản phẩm!',
            'product_code.unique' => 'Mã sản phẩm đã tồn tại!',
            'product_price.required' => 'Bạn chưa nhập giá sản phẩm!',
            'product_price.integer' => 'Giá sản phẩm phải là số!',
            'classify_id.integer' => 'Danh mục chọn không đúng!',
            'classify_id.required' => 'Bạn chưa chọn danh mục sản phẩm!',
            'product_size_0.required' => 'Bạn chưa nhập size sản phẩm!',
            'product_size_1.required' => 'Bạn chưa nhập size sản phẩm!',
            'product_size_2.required' => 'Bạn chưa nhập size sản phẩm!',
            'product_size_3.required' => 'Bạn chưa nhập size sản phẩm!',
            'product_quantity_0.required' => 'Bạn chưa nhập số lượng sản phẩm!',
            'product_quantity_0.integer' => 'Số lượng phải là số nguyên!',
            'product_quantity_1.required' => 'Bạn chưa nhập số lượng sản phẩm!',
            'product_quantity_1.integer' => 'Số lượng phải là số nguyên!',
            'product_quantity_2.required' => 'Bạn chưa nhập số lượng sản phẩm!',
            'product_quantity_2.integer' => 'Số lượng phải là số nguyên!',
            'product_quantity_3.required' => 'Bạn chưa nhập số lượng sản phẩm!',
            'product_quantity_3.integer' => 'Số lượng phải là số nguyên!',
            'product_img_0.required' => 'Bạn phải chọn ít nhất 1 ảnh!',
            'product_des.required' => 'Bạn chưa nhập mô tả cho sản phẩm!' 
        ];

        $request->validate($role, $message);


       $product = Product::create([
            'product_name' => $request->product_name,
            'product_code' => $request->product_code,
            'product_price' => $request->product_price,
            'product_des' => $request->product_des,
            'classify_id' => $request->classify_id
       ]);

       if(!empty($product)){

        for($i = 0; $i<=3 ; $i++){
            $nameQuantity = 'product_quantity_'.$i;
            $nameSize = 'product_size_'.$i;

            Product_infor::create([
                'product_quantity' => $request->$nameQuantity,
                'product_size' => $request->$nameSize,
                'product_id' => $product->product_id,
            ]);
        }

            for($i = 0; $i<=3 ; $i++){
                $nameImg = 'product_img_'.$i;

                if(!empty($request->$nameImg)){
                    $imageName = time().$i.'.'.$request->$nameImg->extension();

                    Storage::putFileAs('public', $request->$nameImg, $imageName);

                    Product_image::create([
                        'product_img' => $imageName,
                        'product_id' => $product->product_id,
                    ]);
                }
                else{
                    Product_image::create([
                        'product_img' => null,
                        'product_id' => $product->product_id,
                    ]);
                }
            }
            
            return back()->with('msg', 'Thêm sản phẩm thành công!');
       }
       return back()->with('msg', 'Liên kết không tồn tại!');
    }

    public function edit(Request $request, $id){
        $title = 'Sửa sản phẩm';

        $classifies = Classify::all();

        $product = Product::where('product_id',$id)->get()->first();

        $images = Product_image::where('product_id',$id)->get();

        $infos = Product_infor::where('product_id',$id)->get();

        $request->session()->put('id_product', $id);
        
        return view('admin.product_item.itemEdit', compact('title', 'classifies', 'product', 'images', 'infos'));
    }
    
    public function update(Request $request){
        $id = session('id_product');

        $role = [
            'product_name' => 'required',
            'product_code' => ['required', Rule::unique('products')->ignore($id, 'product_id')],
            'product_price' => 'required|integer',
            'classify_id' => ['required', 'integer', function($attr, $val, $fail){
                if($val==0){
                    $fail('Bạn chưa chọn danh mục sản phẩm!');
                }
            }],
            // 'product_size' => 'required',
            'product_quantity_0' => 'required|integer',
            'product_quantity_1' => 'required|integer',
            'product_quantity_2' => 'required|integer',
            'product_quantity_3' => 'required|integer',
            // 'product_img_0' => 'required',
            'product_des' => 'required'
        ];

        $message = [
            'product_name.required' => 'Bạn chưa nhập tên sản phẩm!',
            'product_code.required' => 'Bạn chưa nhập mã sản phẩm!',
            'product_code.unique' => 'Mã sản phẩm đã tồn tại!',
            'product_price.required' => 'Bạn chưa nhập giá sản phẩm!',
            'product_price.integer' => 'Giá sản phẩm phải là số!',
            'classify_id.integer' => 'Danh mục chọn không đúng!',
            'classify_id.required' => 'Bạn chưa chọn danh mục sản phẩm!',
            // 'product_size.required' => 'Bạn chưa nhập size sản phẩm!',
            'product_quantity_0.required' => 'Bạn chưa nhập số lượng sản phẩm!!',
            'product_quantity_0.integer' => 'Số lượng phải là số nguyên!',
            'product_quantity_1.required' => 'Bạn chưa nhập số lượng sản phẩm!!',
            'product_quantity_1.integer' => 'Số lượng phải là số nguyên!',
            'product_quantity_2.required' => 'Bạn chưa nhập số lượng sản phẩm!!',
            'product_quantity_2.integer' => 'Số lượng phải là số nguyên!',
            'product_quantity_3.required' => 'Bạn chưa nhập số lượng sản phẩm!!',
            'product_quantity_3.integer' => 'Số lượng phải là số nguyên!',
            // 'product_img_0.required' => 'Bạn chưa chọn ảnh cho sản phẩm!',
            'product_des.required' => 'Bạn chưa nhập mô tả cho sản phẩm!' 
        ];

        $request->validate($role, $message);

        $product = Product::find($id);



        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->product_price = $request->product_price;
        $product->product_des = $request->product_des;
        $product->classify_id = $request->classify_id;

        $result = $product->save();

        if($result){
            $dlt = Product_infor::where('product_id',$id)->delete();
            if($dlt){
                Product_infor::where('product_id',$id)->forceDelete();
                for($i = 0; $i<=3 ; $i++){
                    $nameQuantity = 'product_quantity_'.$i;
                    $nameSize = 'product_size_'.$i;
    
                    Product_infor::create([
                        'product_quantity' => $request->$nameQuantity,
                        'product_size' => $request->$nameSize,
                        'product_id' => $id,
                    ]);
                }

                // Sửa phần thêm chỉnh ảnh sản phẩm

                if(!empty($request->checked)){
                    Product_image::where('product_id', $id)->delete();
                    for($i = 0; $i<=3 ; $i++){
                        $nameImg = 'product_img_'.$i;

                        if(!empty($request->$nameImg)){
                            $imageName = time().$i.'.'.$request->$nameImg->extension();

                            Storage::putFileAs('public', $request->$nameImg, $imageName);

                            Product_image::create([
                                'product_img' => $imageName,
                                'product_id' => $id,
                            ]);
                        }
                        else{
                            Product_image::create([
                                'product_img' => null,
                                'product_id' => $id,
                            ]);
                        }
                    }
                }

                return back()->with('msg', 'Cập nhật sản phẩm thành công!');
            }
            else{
                Product_infor::withTrashed()->where('product_id', $id)->restore();
                return back()->with('msg','Có lỗi xảy ra!');
            }
        }

        return back()->with('msg','Cập nhật thông tin sản phẩm!');
    }
}
