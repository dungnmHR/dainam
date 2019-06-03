@extends('admin.layouts.default')

@section('title')
Thay đổi : Quản trị viên
@parent
@stop

@section('css')

@stop

@section('content')
<!-- HEADER POST -->
<div class="card mb-3">
  <div class="card-body">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="mb-0">Thay đổi : Quản trị viên</h3>
      </div>
    </div>
  </div>
</div>

<!-- MESSAGE PAGE -->
@include('admin.partials.error-list')
@if(session('error-user'))
    <div class="alert alert-danger">
        <strong>{{session('error-user')}}</strong>
    </div>
@endif
@if(session('success-user'))
    <div class="alert alert-success">
        <strong>{{session('success-user')}}</strong>
    </div>
@endif

<!-- FORM -->
<div class="card mb-3">
    <div class="card-header">
        <form action="{{$url_list}}">
            <button class="btn btn-primary mr-1 mb-1" type="submit">
                <span data-fa-transform="shrink-3"></span>Danh sách
            </button>
        </form>     
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-4">
                <form id="form" class="form-horizontal" role="form" action="{{route('user.update', ['id'=>$user->id])}}" 
                enctype="multipart/form-data" method="POST">
                @method('PATCH')
                @csrf
                    <div class="form-group">
                          <label  for="email">Email</label>
                          <input  class="form-control" name="email" value="{{$user->email}}" id="email" 
                                  type="email" placeholder="admin@dainam.com"  required>
                    </div>
                    <div class="form-group">
                          <label  for="name">Tên đầy đủ</label>
                          <input  class="form-control" name="name" value="{{$user->name}}" id="name" 
                                  type="text" placeholder="Nguyễn Văn A">
                    </div>
                    <div class="form-group">
                          <label  for="phone">Số điện thoại</label>
                          <input  class="form-control" name="phone" value="{{$user->phone}}" id="phone" 
                                  type="text" placeholder="0xxxxxxxxxx">
                    </div>
                    <div class="form-group">
                          <label  for="address">Địa chỉ</label>
                          <input  class="form-control" name="address" value="{{$user->address}}" id="address" 
                                  type="text" placeholder="Trung Kính, Hà Nội">
                    </div>
                    <div class="form-group">
                      <label for="role">Chức vụ</label>
                      <select class="form-control" id="role" name="role" required>
                          <option value="marketing" {{$user->role == 'marketing' ? 'selected' : ''}}>Marketing </option>
                          <option value="chamsocvien" {{$user->role == 'chamsocvien' ? 'selected' : ''}}>Tư vấn viên</option>
                       </select>
                    </div>
                    <div class="form-group">
                          <label  for="password">Mật khẩu</label>
                          <input  class="form-control" name="password_new" value="" id="password_new" 
                                  type="password" placeholder="Nhập mật khẩu mới nếu muốn thay đổi." required>
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" {{$user->status == 1 ? 'selected' : ''}}>Sử dụng</option>
                            <option value="0" {{$user->status == 0 ? 'selected' : ''}}>Không sử dụng</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <button class="btn btn-primary mb-3" type="submit">Cập nhật</button>
                    <button class="btn btn-warning mb-3" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
  
    </div>
</div>
<!-- END FORM -->
@stop

@section('js')
@stop