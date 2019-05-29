@extends('admin.layouts.default')

@section('title')
Thêm mới : Quận\Huyện
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
        <h3 class="mb-0">Thêm mới : Quận\Huyện</h3>
      </div>
    </div>
  </div>
</div>

<!-- MESSAGE PAGE -->
@if(session('error-huyen'))
	<div class="alert alert-danger">
		<strong>{{session('error-huyen')}}</strong>
	</div>
@endif
@if(session('success-huyen'))
	<div class="alert alert-success">
		<strong>{{session('success-huyen')}}</strong>
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
            data-action ="{{route('huyen-import')}}"
            type="button">
                <span class="fas fa-cloud-upload-alt" data-fa-transform="shrink-3"></span> Upload file excel
            </button>
        </form>     
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-4">
                <form id="form" class="form-horizontal" role="form" action="{{route('huyen.store')}}" 
                enctype="multipart/form-data" method="POST">
                @csrf
                    <div class="form-group">
                          <label for="name">Mã quận\huyện</label>
                          <input class="form-control" name="code" id="code" type="text" placeholder="1"  required>
                    </div>
                    <div class="form-group">
	                      <label for="name">Tên quận\huyện</label>
	                      <input class="form-control" name="name" id="name" type="text" placeholder="Ba Đình"  required>
                    </div>
                    <div class="form-group">
                        <label for="status">Tỉnh</label>
                        <select class="form-control" id="tinh_id" name="tinh_id" required>
                           @foreach($tinhs as $tinh)
                           <option value={{$tinh->id}}>{{$tinh->name}}</option>
                           @endforeach
                         </select>
                    </div>
                    <div class="form-group">
	                    <label for="status">Trạng thái</label>
	                    <select class="form-control" id="status" name="status" required>
	                        <option value="1">Sử dụng</option>
	                        <option value="0">Không sử dụng</option>
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