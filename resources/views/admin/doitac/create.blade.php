@extends('admin.layouts.default')

@section('title')
Thêm mới đối tác
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
        <h3 class="mb-0">Thêm mới đối tác</h3>
      </div>
    </div>
  </div>
</div>

<!-- MESSAGE PAGE -->
@if(session('error-doitac'))
	<div class="alert alert-danger">
		<strong>{{session('error-doitac')}}</strong>
	</div>
@endif
@if(session('success-cat'))
	<div class="alert alert-success">
		<strong>{{session('success-doitac')}}</strong>
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
                <form>
                    <div class="form-group">
	                      <label for="name">Tên đối tác</label>
	                      <input class="form-control" name="name" id="name" type="text" placeholder="Nguyễn Văn A">
                    </div>

                    <div class="form-group">
	                      <label for="job">Chức vụ</label>
	                      <input class="form-control" name="job" id="job" type="text" placeholder="Gv Khoa B">
                    </div>

                    <div class="form-group">
	                    <label for="status">Trạng thái</label>
	                    <select class="form-control" id="status" name="status">
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