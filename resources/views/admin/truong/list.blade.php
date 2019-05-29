@extends('admin.partials.table')

@section('title')
Danh sách : Trường THPT
@parent
@stop

@section('css')
@stop

@section('content-table')
	@section('title-table')
	Danh sách : Trường THPT
	@stop

	<!-- MESSAGE PAGE -->
	@section('message-status')
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
	@stop

	@section('t-head')
	<th>Mã trường</th>
	<th>Tên trường</th>
	<th>Tỉnh thành</th>
	<th>Địa chỉ</th>
	<th>Khu vực</th>
	<th>Trạng thái</th>
	<th></th>
	@stop
	@section('t-body')
	@foreach($truongs as $data)
	<tr>
		<td>{{$data->code}}</td>
		<td>{{$data->name}}</td>
		<td>
			@if($data->tinh != null)
				{{$data->tinh->name}}
			@else
				Tỉnh thành không tồn tại
			@endif
		</td>
		<td>{{$data->address}}</td>
		<td>{{$data->type}}</td>
		<td>
			@if($data->status == 1)
			<span class="badge badge-pill badge-success">Đang sử dụng</span>
			@else
			<span class="badge badge-pill badge-danger">Ngưng sử dụng</span>
			@endif
			
		</td>
		<td><div class="col-12">
				<form action="{{route('truong.edit', ['id' => $data->id])}}">
					<button class="btn btn-warning btn-sm" type="submit">
						Sửa
					<span class="far fa-edit ml-1" data-fa-transform="shrink-3"></span>
					</button>
					<button class="btn btn-danger btn-sm delete-button" 
					data-action ="{{ route('truong.destroy',$data->id) }}" type="button">
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