@extends('admin.layouts.default')

@section('title')
Thêm mới : Trường THPT
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
        <h3 class="mb-0">Thêm mới : Trường THPT</h3>
      </div>
    </div>
  </div>
</div>

<!-- MESSAGE PAGE -->
@include('admin.partials.error-list')
@if(session('error-truong'))
	<div class="alert alert-danger">
		<strong>{{session('error-truong')}}</strong>
	</div>
@endif
@if(session('success-truong'))
	<div class="alert alert-success">
		<strong>{{session('success-truong')}}</strong>
	</div>
@endif

<!-- FORM -->
<div class="card mb-3">
    <div class="card-header">
        <form action="{{$url_list}}">
            <button class="btn btn-primary mr-1 mb-1" type="submit">
                <span data-fa-transform="shrink-3"></span>Danh sách
            </button>
            <button class="btn btn-primary mr-1 mb-1 import-button"
            data-action ="{{route('truong-import')}}"
            type="button">
                <span class="fas fa-cloud-upload-alt" data-fa-transform="shrink-3"></span> Upload file excel
            </button>
        </form>     
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-4">
                <form id="form" class="form-horizontal" role="form" action="{{route('truong.store')}}" 
                enctype="multipart/form-data" method="POST">
                @csrf
                    <div class="form-group">
                          <label for="name">Mã trường</label>
                          <input class="form-control" value="{{old('code')}}" name="code" id="code" type="text" placeholder="1"  required>
                    </div>
                    <div class="form-group">
	                      <label for="name">Tên trường</label>
	                      <input class="form-control" value="{{old('name')}}" name="name" id="name" type="text" placeholder="THPT ...."  required>
                    </div>
                    <div class="form-group">
                        <label for="tinh_id">Tỉnh</label>
                        <select class="form-control" id="tinh_id" name="tinh_id" required>
                           @foreach($tinhs as $tinh)
                           <option value={{$tinh->id}} {{old('tinh_id') == $tinh->id ? 'selected' : ''}}>{{$tinh->name}}</option>
                           @endforeach
                         </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input class="form-control" value="{{old('address')}}" name="address" id="address" type="text" placeholder="Số 25 Đường ...."  required>
                    </div>
                    <div class="form-group">
                        <label for="type">Khu vực</label>
                        <input class="form-control" value="{{old('type')}}" name="type" id="type" type="text" placeholder="1"  required>
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