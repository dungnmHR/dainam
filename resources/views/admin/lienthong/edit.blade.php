@extends('admin.layouts.default')

@section('title')
Thay đổi dữ liệu : {{$lienthong->name}}
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
        <h3 class="mb-0">Thay đổi dữ liệu : {{$lienthong->name}}</h3>
      </div>
    </div>
  </div>
</div>

<!-- MESSAGE PAGE -->
@include('admin.partials.error-list')
@if(session('error-lienthong'))
    <div class="alert alert-danger">
        <strong>{{session('error-lienthong')}}</strong>
    </div>
@endif
@if(session('success-lienthong'))
    <div class="alert alert-success">
        <strong>{{session('success-lienthong')}}</strong>
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
                <form id="form" class="form-horizontal" role="form" method="post" action="{{route('lienthong.update',['id'=>$lienthong->id])}}">
                @method('PATCH')
                @csrf
                    <input class="form-control" name="_id" id="_id" type="hidden" value="{{$lienthong->id}}">
                    <div class="form-group">
                          <label for="name">Tên</label>
                          <input class="form-control" value="{{$lienthong->name}}" name="name" id="name" type="text" placeholder="Dược học"  required>
                    </div>
                    <div class="form-group">
                        <label for="status">Loại hình</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="1" {{$lienthong->type == 1 ? 'selected' : ''}}>Ngành liên thông</option>
                            <option value="2" {{$lienthong->type == 2 ? 'selected' : ''}}>Hệ liên thông</option>
                         </select>
                    </div>                   
                    <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" {{$lienthong->status == 1 ? 'selected' : ''}}>Sử dụng</option>
                            <option value="0" {{$lienthong->status == 0 ? 'selected' : ''}}>Không sử dụng</option>
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