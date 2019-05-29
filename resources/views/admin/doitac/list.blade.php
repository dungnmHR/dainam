@extends('admin.partials.table')

@section('title')
Danh sách đối tác CRM
@parent
@stop

@section('css')
@stop

@section('content-table')
	@section('title-table')
	Danh sách đối tác CRM
	@stop

	<!-- MESSAGE PAGE -->
	@section('message-status')
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
	@stop

	@section('t-head')
	<th>Tên đối tác</th>
	<th>Chức vụ</th>
	<th>Trạng thái</th>
	<th></th>
	@stop

	@section('t-body')
	<tr>
		<td>Nguyễn Văn Công</td>
		<td>GV Khoa Dược</td>
		<td><span class="badge badge-pill badge-success">Đang hoạt động</span></td>
		<td><div class="col-12">
				<form action="{{route('doitac.edit', ['id' => 1])}}">
					<button class="btn btn-warning btn-sm" type="submit">
						Sửa
					<span class="far fa-edit ml-1" data-fa-transform="shrink-3"></span>
					</button>
					<button class="btn btn-danger btn-sm" type="button">
						Xóa
					<span class="fas fa-trash ml-1" data-fa-transform="shrink-3"></span>
					</button>	
				</form>					
			</div>
		</td>
	</tr>
	@stop
@stop
			
@section('js')
@stop