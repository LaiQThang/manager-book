
@extends('layouts/admin')

@section('title')
   {{ $title}}
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">PRODUCT ADD</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Permission add</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="container-fluid" style="border: 1px solid #ccc;">
        @if (session('msg'))
            <div class="alert alert-success">{{session('msg')}}</div>
        @endif
        
        <form action="{{route('product.postAdd')}}" method="POST" enctype="multipart/form-data">
            <div class="row d-flex align-items-center p-2 justify-content-between" style="border-bottom: 1px solid #CCC;">
                
                <h4 class="mb-0 ml-2">
                    <i class="fa-solid fa-list m-2"></i>
                    Thêm danh mục
                </h4>

                <div class="">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i></button>
                    <a href="{{route('product.index')}}" class="btn btn-info ml-3"><i class="fa-solid fa-arrow-left"></i></a>
                </div>

            </div>
            <div class="row">

                <div class="col-12 d-flex" style="border: 1px solid #ccc; margin-bottom:10px" >
                        <div id="over-review-btn" class="btn-primary" style="padding:10px; margin-left:10px;  width:116px; text-align:center; cursor: pointer">Tổng quan</div>
                        <div id="data-category-btn" style="padding:10px; margin-left:10px;  width:116px; text-align:center; cursor: pointer">Dữ liệu</div>
                        <div id="data-design-btn" style="padding:10px; margin-left:10px;  width:116px; text-align:center; cursor: pointer">Thiết kế</div>
                </div>
                
                <div id="over-review" class="col-12">
                    
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="product_name" class="form-label">Tên sản phẩm:</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" value="{{old("product_name")}}">
                            @error('product_name')
                                <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="product_code" class="form-label">Mã sản phẩm:</label>
                            <input type="text" class="form-control" id="product_code" name="product_code" value="{{old("product_code")}}">
                            @error('product_code')
                                <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="product_price" class="form-label">Giá:</label>
                            <input type="text" class="form-control" id="product_price" name="product_price" value="{{old("product_price")}}">
                            @error('product_price')
                                <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="classify_id" class="form-label">Danh mục:</label>
                            <select class="form-control" name="classify_id">
                                <option value="0">Không</option>
                                @foreach ($classifies as $classify)
                                    <option value="{{$classify->classify_id}}">{{$classify->classify_name}}</option>
                                @endforeach
                            </select>
                            @error('classify_id')
                                <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                            @enderror
                        </div>
            
                        <div class="mb-3 col-12">
                            <label for="product_des" class="form-label">Mô tả:</label>
                            <textarea type="text" class="form-control" style="height: 200px;" id="noidung" name="product_des">{{old('product_des')}}</textarea>
                            @error('product_des')
                                <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div id="data-category" class="col-12 d-none">
                    {{-- <div class="col-2 mb-2">
                        <button type="button" class="btn btn-info">Thêm size</button>
                    </div> --}}
                    <div style="border: 1px solid #ccc; margin-bottom: 10px; padding-top:18px;" class="d-flex handleCategory">
                        <div class="mb-3 col-5 d-flex">
                            <label for="product_size" class="form-label" style="width:90px;">Size:</label>
                            <div class="d-flex flex-column  w-100">
                                <input type="text" readonly="true" class="form-control" id="product_size" name="product_size_0" value="S">
                                @error('product_size_0')
                                    <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="mb-3 col-5 d-flex">
                            <label for="product_quantity" class="form-label" style="width:90px;">Số lượng:</label>
                            <div class="d-flex flex-column w-100">
                                <input type="text" class="form-control" id="product_quantity" name="product_quantity_0" value="{{old("product_quantity")}}">
                                @error('product_quantity_0')
                                    <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div style="border: 1px solid #ccc; margin-bottom: 10px; padding-top:18px;" class="d-flex handleCategory">
                        <div class="mb-3 col-5 d-flex">
                            <label for="product_size" class="form-label" style="width:90px;">Size:</label>
                            <div class="d-flex flex-column  w-100">
                                <input type="text" readonly="true" class="form-control" id="product_size" name="product_size_1" value="M">
                                @error('product_size_1')
                                    <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="mb-3 col-5 d-flex">
                            <label for="product_quantity" class="form-label" style="width:90px;">Số lượng:</label>
                            <div class="d-flex flex-column w-100">
                                <input type="text" class="form-control" id="product_quantity" name="product_quantity_1" value="{{old("product_quantity")}}">
                                @error('product_quantity_1')
                                    <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div style="border: 1px solid #ccc; margin-bottom: 10px; padding-top:18px;" class="d-flex handleCategory">
                        <div class="mb-3 col-5 d-flex">
                            <label for="product_size" class="form-label" style="width:90px;">Size:</label>
                            <div class="d-flex flex-column  w-100">
                                <input type="text" readonly="true" class="form-control" id="product_size" name="product_size_2" value="L">
                                @error('product_size_2')
                                    <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="mb-3 col-5 d-flex">
                            <label for="product_quantity" class="form-label" style="width:90px;">Số lượng:</label>
                            <div class="d-flex flex-column w-100">
                                <input type="text" class="form-control" id="product_quantity" name="product_quantity_2" value="{{old("product_quantity")}}">
                                @error('product_quantity_2')
                                    <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div style="border: 1px solid #ccc; margin-bottom: 10px; padding-top:18px;" class="d-flex handleCategory">
                        <div class="mb-3 col-5 d-flex">
                            <label for="product_size" class="form-label" style="width:90px;">Size:</label>
                            <div class="d-flex flex-column  w-100">
                                <input type="text" readonly="true" class="form-control" id="product_size" name="product_size_3" value="XL">
                                @error('product_size_3')
                                    <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
            
                        <div class="mb-3 col-5 d-flex">
                            <label for="product_quantity" class="form-label" style="width:90px;">Số lượng:</label>
                            <div class="d-flex flex-column w-100">
                                <input type="text" class="form-control" id="product_quantity" name="product_quantity_3" value="{{old("product_quantity")}}">
                                @error('product_quantity_3')
                                    <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>

                <div id="data-design" class="col-12 d-none">
                    <div class="mb-3 col-12">
                        <label for="upload_file" class="form-label">Ảnh đại diện: </label>
                        <input type="file" accept="image/*"  id="upload_file" name="product_img_0" >
                        @error('product_img_0')
                            <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-12">
                        <label for="upload_file" class="form-label">Ảnh 1: </label>
                        <input type="file" accept="image/*"  id="upload_file" name="product_img_1" >
                        
                    </div>

                    <div class="mb-3 col-12">
                        <label for="upload_file" class="form-label">Ảnh 2: </label>
                        <input type="file" accept="image/*"  id="upload_file" name="product_img_2" >
                        
                    </div>

                    <div class="mb-3 col-12">
                        <label for="upload_file" class="form-label">Ảnh 3: </label>
                        <input type="file" accept="image/*"  id="upload_file" name="product_img_3" >
                        
                    </div>
        
                    
                </div>

                    @csrf
                    
            </div>
        </form>
    </div>
</div>
@endsection
