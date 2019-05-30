@extends('admin.layouts.default')

@section('title')
Thêm mới: Tổ hợp xét tuyển
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
        <h3 class="mb-0">Thêm mới: Tổ hợp xét tuyển</h3>
      </div>
    </div>
  </div>
</div>

<!-- MESSAGE PAGE -->
@include('admin.partials.error-list')
@if(session('error-tohopxt'))
	<div class="alert alert-danger">
		<strong>{{session('error-tohopxt')}}</strong>
	</div>
@endif
@if(session('success-tohopxt'))
	<div class="alert alert-success">
		<strong>{{session('success-tohopxt')}}</strong>
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
                <form id="form" class="form-horizontal" role="form" action="{{route('tohopxt.store')}}" 
                enctype="multipart/form-data" method="POST">
                @csrf
                    <div class="form-group">
	                      <label for="name">Mã</label>
	                      <input class="form-control" value="{{old('code')}}" name="code" id="code" type="text" placeholder="A00" required>
                    </div>

                    <div class="form-group">
	                      <label for="job">Nội dung</label>
	                      <input class="form-control" value="{{old('content')}}" name="content" id="content" type="text" placeholder="Toán-Lý-Hóa" required>
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