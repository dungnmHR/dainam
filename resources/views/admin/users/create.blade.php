@extends('admin.layouts.default')

@section('title')
Thêm mới : Quản trị viên
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
        <h3 class="mb-0">Thêm mới : Quản trị viên</h3>
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
                <form id="form" class="form-horizontal" role="form" action="{{route('user.store')}}" 
                enctype="multipart/form-data" method="POST">
                @csrf
                    <div class="form-group">
                          <label  for="email">Email</label>
                          <input  class="form-control" name="email" value="{{old('email')}}" id="email" 
                                  type="email" placeholder="admin@dainam.com"  required>
                    </div>
                    <div class="form-group">
                          <label  for="name">Tên đầy đủ</label>
                          <input  class="form-control" name="name" value="{{old('name')}}" id="name" 
                                  type="text" placeholder="Nguyễn Văn A">
                    </div>
                    <div class="form-group">
                          <label  for="phone">Số điện thoại</label>
                          <input  class="form-control" name="phone" value="{{old('phone')}}" id="phone" 
                                  type="text" placeholder="0xxxxxxxxxx">
                    </div>
                    <div class="form-group">
                          <label  for="address">Địa chỉ</label>
                          <input  class="form-control" name="address" value="{{old('address')}}" id="address" 
                                  type="text" placeholder="Trung Kính, Hà Nội">
                    </div>
                    <div class="form-group">
                      <label for="role">Chức vụ</label>
                      <select class="form-control" id="role" name="role" required>
                          <option value="marketing" {{old('status') == 'marketing' ? 'selected' : ''}}>Marketing </option>
                          <option value="chamsocvien" {{old('status') == 'chamsocvien' ? 'selected' : ''}}>Tư vấn viên</option>
                       </select>
                    </div>
                    <div class="form-group">
                          <label  for="password">Mật khẩu</label>
                          <input  class="form-control" name="password" value="{{old('password')}}" id="password" 
                                  type="password" placeholder="xxxxxxxx" required>
                    </div>
                    <div class="form-group">
	                    <label for="status">Trạng thái</label>
	                    <select class="form-control" id="status" name="status" required>
	                        <option value="1" {{old('status') == 1 ? 'selected' : ''}}>Sử dụng</option>
	                        <option value="0" {{old('status') == 0 ? 'selected' : ''}}>Không sử dụng</option>
	                    </select>
                    </div>
                    <div class="form-group">
                    <button class="btn btn-primary mb-3" type="submit">Tạo mới</button>
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