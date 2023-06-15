@extends('layouts/admin')

@section('title')
  {{$title}}
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">PRODUCTS LIST</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <a href="{{route('product.add')}}" class="btn btn-primary mr-3" style="color: #FFF;"><i class="fa-solid fa-plus"></i></a>
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="container-fluid" style="border: 1px solid #ccc;">
        <div class="row d-flex align-items-center p-2">
            <i class="fa-solid fa-list m-2"></i>
            <h4 class="mb-0 ml-2">DANH SÁCH SẢN PHẨM</h4>
        </div>
      @if (session('msg'))
          <div class="alert alert-success">{{session('msg')}}</div>
      @endif
      <table class="table table-bordered">
        <thead class="row" style="display: table-row-group">
          <tr>
            <th class="col-2" scope="col">Tên sản phẩm</th>
            <th class="col-2" scope="col">Mã sản phẩm</th>
            <th class="col-2" scope="col">Giá</th>
            <th class="col-2" scope="col">Thuộc danh mục</th>
            <th class="col-2" scope="col">Lựa chọn</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr>
              <td>{{$product->product_name}}</td>
              <td>{{$product->product_code}}</td>
              <td>{{$product->product_price}}</td>
              <td>{{$product->classify_name}}</td>
              <td>
                {{-- $product_id --}}
                <a href="{{route('product.edit', ['id' => $product->product_id])}}" class="btn btn-primary mt-2">Edit</a>
                <a href="{{route('product.delete', ['id' => $product->product_id])}}"  class="btn btn-danger mt-2 delete_user">Delete</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
</div>
@endsection