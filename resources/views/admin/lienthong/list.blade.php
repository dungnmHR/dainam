@extends('admin.partials.table')

@section('title')
Danh sách : Loại hình liên thông
@parent
@stop

@section('css')
@stop

@section('content-table')
	@section('title-table')
	Danh sách : Loại hình liên thông
	@stop

	<!-- MESSAGE PAGE -->
	@section('message-status')
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
	@stop

	@section('t-head')
	<th>Loại hình</th>
	<th>Tên</th>
	<th>Trạng thái</th>
	<th></th>
	@stop
	@section('t-body')
	@foreach($lienthongs as $data)
	<tr>
		<td>
			@if($data->type == 1)
			<span class="badge badge-pill badge-primary">Ngành liên thông</span>
			@else
			<span class="badge badge-pill badge-success">Hệ liên thông</span>
			@endif			
		</td>
		<td>{{$data->name}}</td>
		<td>
			@if($data->status == 1)
			<span class="badge badge-pill badge-success">Đang sử dụng</span>
			@else
			<span class="badge badge-pill badge-danger">Ngưng sử dụng</span>
			@endif
			
		</td>
		<td><div class="col-12">
				<form action="{{route('lienthong.edit', ['id' => $data->id])}}">
					<button class="btn btn-warning btn-sm" type="submit">
						Sửa
					<span class="far fa-edit ml-1" data-fa-transform="shrink-3"></span>
					</button>
					<button class="btn btn-danger btn-sm delete-button" 
					data-action ="{{ route('lienthong.destroy',$data->id) }}" type="button">
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