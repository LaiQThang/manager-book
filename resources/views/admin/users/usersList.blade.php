@extends('layouts/admin')

@section('title')
  {{$title}}
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">USER LIST</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">User</li>
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
            <th class="col-1" scope="col">Id</th>
            <th class="col-2" scope="col">full_name</th>
            <th class="col-2" scope="col">email</th>
            <th class="col-2" scope="col">password</th>
            <th class="col-1" scope="col">permission</th>
            <th class="col-1" scope="col" >created_at</th>
            <th class="col-1" scope="col">update_at</th>
            <th class="col-2" scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->full_name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->password}}</td>
            <td>{{$user->permission_name}}</td>
            <td >{{$user->created_at}}</td>
            <td>{{$user->updated_at}}</td>
            <td>
              <a href="{{route('users.edit',['id' => $user->id])}}" class="btn btn-primary mt-2">Edit</a>
              <a href="{{route('users.delete', ['id' => $user->id])}}"  class="btn btn-danger mt-2 delete_user">Delete</a>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
    <div class="d-flex justify-content-center aligh-item-center">
      {{$users->links('admin.paginations.pagination', ['userList' => $users])}}
    </div>
</div>
@endsection