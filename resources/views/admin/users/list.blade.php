@extends('admin.partials.table')

@section('title')
Danh sách : Quản trị viên
@parent
@stop

@section('css')
@stop

@section('content-table')
	@section('title-table')
	Danh sách : Quản trị viên
	@stop

	<!-- MESSAGE PAGE -->
	@section('message-status')
		@if(session('error-user'))
		    <div class="alert alert-danger">
		        <strong>{{session('error-user')}}</strong>
		    </div>
		@endif
		@if(session('success-user'))
		    <div class="alert alert-success">
		        <strong>{{session('success-user')}}</strong>
		    </div>
		@endif
	@stop

	@section('t-head')
	<th>Chức vụ</th>
	<th>Tên</th>
	<th>Số điện thoại</th>
	<th>Email</th>
	<th>Địa chỉ</th>
	<th>Trạng thái</th>
	<th></th>
	@stop

	@section('t-body')
	@foreach($users as $data)
	<tr>
		<td>
			@if($data->role == 'admin')
			<span class="badge badge-pill badge-danger">Admin</span>
			@elseif($data->role == 'chamsocvien')
			<span class="badge badge-pill badge-primary">Chăm sóc viên</span>
			@elseif($data->role == 'marketing')
			<span class="badge badge-pill badge-warning">Marketing</span>
			@endif			
		</td>
		<td>{{$data->name}}</td>
		<td>{{$data->phone}}</td>
		<td>{{$data->email}}</td>
		<td>{{$data->address}}</td>
		<td>
			@if($data->status == 1)
			<span class="badge badge-pill badge-success">Đang sử dụng</span>
			@else
			<span class="badge badge-pill badge-danger">Ngưng sử dụng</span>
			@endif
			
		</td>
		<td><div class="col-12">
				<form action="{{route('user.edit', ['id' => $data->id])}}">
					<button class="btn btn-warning btn-sm" type="submit">
						Sửa
					<span class="far fa-edit ml-1" data-fa-transform="shrink-3"></span>
					</button>
					<button class="btn btn-danger btn-sm delete-button" 
					data-action ="{{ route('user.destroy',$data->id) }}" type="button">
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