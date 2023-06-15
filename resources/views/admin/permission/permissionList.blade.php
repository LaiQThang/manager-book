@extends('layouts/admin')

@section('title')
  {{$title}}
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">PERMISSION LIST</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <a href="{{route('permission.add')}}" class="btn btn-primary mr-3" style="color: #FFF;"><i class="fa-solid fa-plus"></i></a>
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Permission</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      @if (session('msg'))
          <div class="alert alert-success">{{session('msg')}}</div>
      @endif
      <table class="table table-bordered">
        <thead class="row" style="display: table-row-group">
          <tr>
            <th class="col-2" scope="col">permission_id</th>
            <th class="col-2" scope="col">permission_name</th>
            <th class="col-1" scope="col" >created_at</th>
            <th class="col-1" scope="col">update_at</th>
            <th class="col-2" scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($permissions as $permission)
          <tr>
            <td>{{$permission->permission_id}}</td>
            <td>{{$permission->permission_name}}</td>
            <td >{{$permission->created_at}}</td>
            <td>{{$permission->updated_at}}</td>
            <td>
              <a href="{{route('permission.edit',['id' => $permission->id])}}" class="btn btn-primary mt-2">Edit</a>
              <a href="{{route('permission.delete', ['id' => $permission->id])}}"  class="btn btn-danger mt-2 delete_user">Delete</a>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
    
</div>
@endsection