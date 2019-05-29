@extends('admin.partials.table')

@section('title')
Danh sách: Đối tác CRM
@parent
@stop

@section('css')
@stop

@section('content-table')
	@section('title-table')
	Danh sách: Đối tác CRM
	@stop

	<!-- MESSAGE PAGE -->
	@section('message-status')
		@if(session('error-doitac'))
		    <div class="alert alert-danger">
		        <strong>{{session('error-doitac')}}</strong>
		    </div>
		@endif
		@if(session('success-doitac'))
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
	@foreach($doitacs as $data)
	<tr>
		<td>{{$data->name}}</td>
		<td>{{$data->job}}</td>
		<td>
			@if($data->status == 1)
			<span class="badge badge-pill badge-success">Đang sử dụng</span>
			@else
			<span class="badge badge-pill badge-danger">Ngưng sử dụng</span>
			@endif
			
		</td>
		<td><div class="col-12">
				<form action="{{route('doitac.edit', ['id' => $data->id])}}">
					<button class="btn btn-warning btn-sm" type="submit">
						Sửa
					<span class="far fa-edit ml-1" data-fa-transform="shrink-3"></span>
					</button>
					<button class="btn btn-danger btn-sm delete-button" 
					data-action ="{{ route('doitac.destroy',$data->id) }}" type="button">
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