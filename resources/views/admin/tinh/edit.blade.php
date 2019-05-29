@extends('admin.layouts.default')

@section('title')
Thay đổi tỉnh : {{$tinh->name}}
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
        <h3 class="mb-0">Thay đổi tỉnh : {{$tinh->name}}</h3>
      </div>
    </div>
  </div>
</div>

<!-- MESSAGE PAGE -->
@if(session('error-tinh'))
    <div class="alert alert-danger">
        <strong>{{session('error-tinh')}}</strong>
    </div>
@endif
@if(session('success-tinh'))
    <div class="alert alert-success">
        <strong>{{session('success-tinh')}}</strong>
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
                <form id="form" class="form-horizontal" role="form" method="post" action="{{route('tinh.update',['id'=>$tinh->id])}}">
                @method('PATCH')
                @csrf
                    <input class="form-control" name="_id" id="_id" type="hidden" value="{{$tinh->id}}">
                    <div class="form-group">
                          <label for="name">Mã tỉnh</label>
                          <input class="form-control" name="code" id="code" type="text" placeholder="HN"  value="{{$tinh->code}}" required>
                    </div>
                    <div class="form-group">
	                      <label for="name">Tên tỉnh</label>
	                      <input class="form-control" name="name" id="name" type="text" value="{{$tinh->name}}" required>
                    </div>
                    <div class="form-group">
	                    <label for="status">Trạng thái</label>
	                    <select class="form-control" id="status" name="status">
	                        <option value="1" {{$tinh->status == '1' ? 'selected' : ''}}>Sử dụng</option>
	                        <option value="0" {{$tinh->status == '0' ? 'selected' : ''}}>Không sử dụng</option>
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