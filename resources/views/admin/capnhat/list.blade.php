@extends('admin.partials.table')

@section('title')
Danh sách : Loại hình đăng kí cập nhật
@parent
@stop

@section('css')
@stop

@section('content-table')
	@section('title-table')
	Danh sách : Loại hình đăng kí cập nhật
	@stop

	<!-- MESSAGE PAGE -->
	@section('message-status')
		@if(session('error-capnhat'))
		    <div class="alert alert-danger">
		        <strong>{{session('error-capnhat')}}</strong>
		    </div>
		@endif
		@if(session('success-capnhat'))
		    <div class="alert alert-success">
		        <strong>{{session('success-capnhat')}}</strong>
		    </div>
		@endif
	@stop

	@section('t-head')
	<th>Tên</th>
	<th>Trạng thái</th>
	<th></th>
	@stop
	@section('t-body')
	@foreach($capnhats as $data)
	<tr>
		<td>{{$data->name}}</td>
		<td>
			@if($data->status == 1)
			<span class="badge badge-pill badge-success">Đang sử dụng</span>
			@else
			<span class="badge badge-pill badge-danger">Ngưng sử dụng</span>
			@endif
			
		</td>
		<td><div class="col-12">
				<form action="{{route('capnhat.edit', ['id' => $data->id])}}">
					<button class="btn btn-warning btn-sm" type="submit">
						Sửa
					<span class="far fa-edit ml-1" data-fa-transform="shrink-3"></span>
					</button>
					<button class="btn btn-danger btn-sm delete-button" 
					data-action ="{{ route('capnhat.destroy',$data->id) }}" type="button">
						Xóa
					<span class="fas fa-trash ml-1" data-fa-transform="shrink-3"></span>
					</button>	
				</form>					
			</div>
		</td>
	</tr>
	@endforeach
	@stop
@stop
			
@section('js')
@stop