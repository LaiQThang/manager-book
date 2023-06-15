@extends('layouts/admin')

@section('title')
  {{$title}}
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Category LIST</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <a href="{{route('category.add')}}" class="btn btn-primary mr-3" style="color: #FFF;"><i class="fa-solid fa-plus"></i></a>
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Permission</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="container-fluid" style="border: 1px solid #ccc;">
        <div class="row d-flex align-items-center p-2">
            <i class="fa-solid fa-list m-2"></i>
            <h4 class="mb-0 ml-2">DANH MỤC SẢN PHẨM</h4>
        </div>
      @if (session('msg'))
          <div class="alert alert-success">{{session('msg')}}</div>
      @endif
      <table class="table table-bordered">
        <thead class="row" style="display: table-row-group">
          <tr>
            <th class="col-2" scope="col">ID</th>
            <th class="col-8" scope="col">Tên danh mục</th>
            <th class="col-2" scope="col">Lựa chọn</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
          <tr>
            <td>{{$category->id_category}}</td>
            <td>{{$category->category_name}}</td>
            <td>
              <a href="{{route('category.edit',['id' => $category->id_category])}}" class="btn btn-primary mt-2">Edit</a>
              <a href="{{route('category.delete', ['id' => $category->id_category])}}"  class="btn btn-danger mt-2 delete_user">Delete</a>
            </td>
          </tr>
          @endforeach

          @foreach ($classifies as $classify)
          <tr>
            <td>{{$classify->classify_id}}</td>
            <td>{{$classify->category_name.' > '.$classify->classify_name}}</td>
            <td>
              <a href="{{route('classify.edit',['id' => $classify->classify_id])}}" class="btn btn-primary mt-2">Edit</a>
              <a href="{{route('classify.delete', ['id' => $classify->classify_id])}}"  class="btn btn-danger mt-2 delete_user">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    
</div>
@endsection