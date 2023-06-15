@php
    use App\Models\Category;

    $categories = Category::all();
@endphp

@extends('layouts/admin')

@section('title')
   {{ $title}}
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">CATEGORY ADD</h1>
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
        
        <form action="{{ !empty($getCate) ? route('category.update') : route('classify.update') }}" method="POST">
            <div class="row d-flex align-items-center p-2 justify-content-between" style="border-bottom: 1px solid #CCC;">
                
                <h4 class="mb-0 ml-2">
                    <i class="fa-solid fa-list m-2"></i>
                    Thêm danh mục
                </h4>

                <div class="">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i></button>
                    <a href="{{route('category.index')}}" class="btn btn-info ml-3"><i class="fa-solid fa-arrow-left"></i></a>
                </div>

            </div>
        <div class="row">

            <div class="col-12 d-flex" style="border: 1px solid #ccc; margin-bottom:10px" >
                <div id="over-review-btn" class="btn-primary" style="padding:10px; margin-left:10px;  width:116px; text-align:center; cursor: pointer">Tổng quan</div>
                <div id="data-category-btn" style="padding:10px; margin-left:10px;  width:116px; text-align:center; cursor: pointer">Dữ liệu</div>
            </div>
            
            <div id="over-review" class="col-12">
                <div class="mb-3 col-12">
                    <label for="category_name" class="form-label">Tên danh mục</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" value="{{ !empty($getCate) ? $getCate->category_name : $getClassify->classify_name}}">
                    @error('category_name')
                        <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                    @enderror
                </div>
    
                <div class="mb-3 col-12">
                    <label for="category_des" class="form-label">Mô tả:</label>
                    <textarea type="text" class="form-control" style="height: 200px;" id="category_des" name="category_des" value="{{old('category_des')}}"></textarea>
                    @error('category_des')
                        <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                    @enderror
                </div>

            </div>
            <div id="data-category" class="col-12 d-none">
                <div class="mb-3 col-12">
                    <label for="permission_id" class="form-label">Danh mục gốc</label>
                    <select class="form-control" name="category_cre">
                        <option value="0">Không</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id_category}}" {{ !empty($getClassify) && $getClassify->id_category === $category->id_category ? 'selected' : false }}>{{$category->category_name}}</option>
                        @endforeach
                    </select>
                    @error('permission_id')
                        <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                    @enderror
                </div>
    
                <div class="mb-3 col-12">
                    <label for="category_des_cre" class="form-label">Mô tả:</label>
                    <textarea type="text" class="form-control" style="height: 200px;" id="category_des_cre" name="category_des_cre" value="{{old('category_des_cre')}}"></textarea>
                    @error('category_des_cre')
                        <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                    @enderror
                </div>

            </div>
                @csrf
                
                
            </div>
        </form>
        
        
    </div>
</div>
@endsection
