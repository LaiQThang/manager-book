@extends('layouts/admin')

@section('title')
   {{ $title}}
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">ADD PERMISSION</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            <li class="breadcrumb-item active">Permission add</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="container-fluid">
        @if (session('msg'))
            <div class="alert alert-success">{{session('msg')}}</div>
        @endif
        <form action="{{route('permission.postAdd')}}" method="POST" id="permission_submit">
        <div class="row">
                <div class="mb-3 col-6">
                    <label for="permission_id" class="form-label">Permission ID</label>
                    <input type="text" class="form-control" id="permission_id" name="permission_id" value="{{old("permission_id")}}">
                    @error('permission_id')
                        <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                    @enderror
                    <span class="permission_id--err" style="color: red"></span>

                </div>
    
                <div class="mb-3 col-6">
                    <label for="permission_name" class="form-label">Permission name</label>
                    <input type="text" class="form-control" id="permission_name" name="permission_name" value="{{old('permission_name')}}">
                    @error('permission_name')
                        <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                    @enderror
                    <span class="permission_name--err" style="color: red"></span>
                </div>
    
                @csrf
                
                <div class="mb-3 col-6">
                    <button type="submit" class="btn btn-primary">Save</button>
                    {{-- <button class="btn btn-warning ml-3">Reset</button> --}}
                    <a href="{{route('permission.index')}}" class="btn btn-info ml-3">Quit</a>
                </div>
            </div>
        </form>
        
        
    </div>
</div>
@endsection