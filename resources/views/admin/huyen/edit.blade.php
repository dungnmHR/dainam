@extends('admin.layouts.default')

@section('title')
Thay đổi quận\huyện : {{$huyen->name}}
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
        <h3 class="mb-0">Thay đổi quận\huyện : {{$huyen->name}}</h3>
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
        </form>     
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-4">
                <form id="form" class="form-horizontal" role="form" method="post" action="{{route('huyen.update',['id'=>$huyen->id])}}">
                @method('PATCH')
                @csrf
                    <input class="form-control" name="_id" id="_id" type="hidden" value="{{$huyen->id}}">
                    <div class="form-group">
                          <label for="name">Mã quận\huyện</label>
                          <input class="form-control" name="code" id="code" type="text" placeholder="HN"  value="{{$huyen->code}}" required>
                    </div>
                    <div class="form-group">
	                      <label for="name">Tên quận\huyện</label>
	                      <input class="form-control" name="name" id="name" type="text" value="{{$huyen->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Tỉnh</label>
                        <select class="form-control" id="tinh_id" name="tinh_id" required>
                           @foreach($tinhs as $tinh)
                           <option value={{$tinh->id}} {{$huyen->tinh_id == $tinh->id ? 'selected' : ''}}>{{$tinh->name}}</option>
                           @endforeach
                         </select>
                    </div>
                    <div class="form-group">
	                    <label for="status">Trạng thái</label>
	                    <select class="form-control" id="status" name="status" required>
	                        <option value="1" {{$huyen->status == '1' ? 'selected' : ''}}>Sử dụng</option>
	                        <option value="0" {{$huyen->status == '0' ? 'selected' : ''}}>Không sử dụng</option>
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