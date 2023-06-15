@extends('layouts/admin')

@section('title')
    {{$title}}
@endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">EDIT USER</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">User edit</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="container-fluid">
        @if (session('msg'))
            <div class="alert alert-success">{{session('msg')}}</div>
        @endif
        <form action="{{route('users.update')}}" method="POST" enctype="multipart/form-data">
        <div class="row">
                <div class="mb-3 col-6">
                    <label for="email" class="form-label">Email address</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                    @error('email')
                        <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                    @enderror
                </div>
    
                <div class="mb-3 col-6">
                    <label for="full_name" class="form-label">Full name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="{{$user->full_name}}">
                    @error('full_name')
                        <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                    @enderror
                </div>
    
                <div class="mb-3 col-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" readonly="true" id="password" name="password" value="{{ $user->password}}">
                    @error('password')
                        <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                    @enderror
                </div>
    
                <div class="mb-3 col-6">
                    <label for="password_confirm" class="form-label">Password confirm</label>
                    <input type="password" class="form-control" readonly="true" id="password_confirm" name="password_confirm" value="{{$user->password}}">
                    @error('password_confirm')
                        <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3 col-6">
                    <label for="permission" class="form-label">Permission</label>
                    <select class="form-control" id="permission" name="permission">
                        <option value="0">Select permission</option>
                        @foreach ($permission as $value)
                            <option value="{{$value->permission_id}}" {{$value->permission_id == $user->permission ? 'selected' : false}}>{{$value->permission_name}}</option>
                        @endforeach
                    </select>
                    @error('permission')
                        <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                    @enderror
                </div>
    
                <div class="mb-3 col-6">
                    <label for="upload_file" class="form-label">Avatar</label>
                    <br>
                    <input type="file" accept="image/*"  id="upload_file" name="image" >
                    <img src="{{URL::asset('storage/'.$user->image)}}" alt="" style="width:100px; heigh:auto;">
                    @error('image')
                        <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                    @enderror
                </div>

                @csrf

                <div class="mb-3 col-12">
                    <input type="checkbox" id="change_password" name="change_password" >
                    <label for="change_password" class="form-controll">Change password</label>
                </div>
                

                <div class="mb-3 col-6">
                    <button type="submit" class="btn btn-primary">Save as</button>
                    {{-- <button class="btn btn-warning ml-3">Reset</button> --}}
                    <a href="{{route('users.index')}}" class="btn btn-info ml-3">Quit</a>
                </div>
            </div>
        </form>
        
        
    </div>
</div>
@endsection 