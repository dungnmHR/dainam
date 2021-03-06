@extends('admin.layouts.default')

@section('title')
Thay đổi thông tin: Tổ hợp xét tuyển
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
        <h3 class="mb-0">Thay đổi thông tin: Tổ hợp xét tuyển</h3>
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
                <form id="form" class="form-horizontal" role="form" method="post" action="{{route('tohopxt.update',['id'=>$tohopxt->id])}}">
                @method('PATCH')
                @csrf
                    <input class="form-control" name="_id" id="_id" type="hidden" value="{{$tohopxt->id}}">
                    <div class="form-group">
	                      <label for="name">Mã</label>
	                      <input class="form-control" name="code" id="code" type="text" value="{{$tohopxt->code}}" required>
                    </div>

                    <div class="form-group">
	                      <label for="job">Nội dung</label>
	                      <input class="form-control" name="content" id="content" type="text" value="{{$tohopxt->content}}" required>
                    </div>

                    <div class="form-group">
	                    <label for="status">Trạng thái</label>
	                    <select class="form-control" id="status" name="status" required>
	                        <option value="1" {{$tohopxt->status == '1' ? 'selected' : ''}}>Sử dụng</option>
	                        <option value="0" {{$tohopxt->status == '0' ? 'selected' : ''}}>Không sử dụng</option>
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