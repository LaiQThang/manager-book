{{-- {{dd($permission_item)}} --}}

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
        <form action="{{route('permission.update')}}" method="POST">
        <div class="row">
                <div class="mb-3 col-6">
                    <label for="permission_id" class="form-label">Permission ID</label>
                    <input type="text" class="form-control" readonly="fasle" id="permission_id" name="permission_id" value="{{$permission->permission_id}}">
                    @error('permission_id')
                        <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                    @enderror
                </div>
    
                <div class="mb-3 col-6">
                    <label for="permission_name" class="form-label">Permission name</label>
                    <input type="text" class="form-control" id="permission_name" name="permission_name" value="{{$permission->permission_name}}">
                    @error('permission_name')
                        <span class="mt-2 d-block" style="color: red;">{{$message}}</span>
                    @enderror
                </div>

                <div class="container-fluid">
                  <table class="table table-bordered">
                    <thead class="row" style="display: table-row-group">
                      <tr>
                        <th class="col-2" scope="col">Tên quyền</th>
                        {{-- <th class="col-2" scope="col">Linked</th> --}}
                        <th class="col-2 text-center" scope="col">Lựa chọn</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($permission_list as $key => $permission_item)
                      <tr>
                        <td>{{$permission_item->permission_name}}</td>
                        {{-- <td>{{$permission_item->permission_url}}</td> --}}
                        <td><input type="checkbox" {{$permission->permission_id == '2' ? 'disabled' : ''}} name="permission_name_{{$key}}" 
                          @foreach ($permission_items as $item)
                              {{$permission_item->id == $item->permission_list_id  ? 'checked' : ''}}
                          @endforeach
                          value="{{$permission_item->id}}" class="form-control"></td>
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
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