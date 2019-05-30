@extends('admin.layouts.default')

@section('title')
Thay đổi trường : {{$truong->name}}
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
        <h3 class="mb-0">Thay đổi trường : {{$truong->name}}</h3>
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
        </form>     
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-4">
                <form id="form" class="form-horizontal" role="form" method="post" action="{{route('truong.update',['id'=>$truong->id])}}">
                @method('PATCH')
                @csrf
                    <input class="form-control" name="_id" id="_id" type="hidden" value="{{$truong->id}}">
                    <div class="form-group">
                          <label for="name">Mã trường</label>
                          <input class="form-control" name="code" id="code" type="text" placeholder="HN"  value="{{$truong->code}}" required>
                    </div>
                    <div class="form-group">
	                      <label for="name">Tên trường</label>
	                      <input class="form-control" name="name" id="name" type="text" value="{{$truong->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Tỉnh</label>
                        <select class="form-control" id="tinh_id" name="tinh_id" required>
                           @foreach($tinhs as $tinh)
                           <option value={{$tinh->id}} {{$truong->tinh_id == $tinh->id ? 'selected' : ''}}>{{$tinh->name}}</option>
                           @endforeach
                         </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Địa chỉ</label>
                        <input class="form-control" name="address" id="address" type="text" value="{{$truong->address}}" placeholder="Số 25 Đường ...."  required>
                    </div>
                    <div class="form-group">
                        <label for="name">Khu vực</label>
                        <input class="form-control" name="type" id="type" type="text" value="{{$truong->type}}" placeholder="1"  required>
                    </div>
                    <div class="form-group">
	                    <label for="status">Trạng thái</label>
	                    <select class="form-control" id="status" name="status" required>
	                        <option value="1" {{$truong->status == '1' ? 'selected' : ''}}>Sử dụng</option>
	                        <option value="0" {{$truong->status == '0' ? 'selected' : ''}}>Không sử dụng</option>
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