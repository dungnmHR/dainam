@extends('admin.partials.table')

@section('title')
Danh sách: Ngành xét tuyển
@parent
@stop

@section('css')
@stop

@section('content-table')
	@section('title-table')
	Danh sách: Ngành xét tuyển
	@stop

	<!-- MESSAGE PAGE -->
	@section('message-status')
		@if(session('error-nganhxt'))
		    <div class="alert alert-danger">
		        <strong>{{session('error-nganhxt')}}</strong>
		    </div>
		@endif
		@if(session('success-nganhxt'))
		    <div class="alert alert-success">
		        <strong>{{session('success-nganhxt')}}</strong>
		    </div>
		@endif
	@stop

	@section('t-head')
	<th>Mã ngành</th>
	<th>Tên</th>
	<th>Tổ hợp xét tuyển</th>
	<th>Trạng thái</th>
	<th></th>
	@stop

	@section('t-body')
	@foreach($nganhxts as $nganhxt)
	<tr>
		<td>{{$nganhxt->code}}</td>
		<td>{{$nganhxt->name}}</td>list_tohop
		<td>
			@foreach($nganhxt->list_tohop as $key=>$value)
			<span class="badge badge-pill badge-success">{{$value}}</span>
			@endforeach
		</td>
		<td>
			@if($nganhxt->status == 1)
			<span class="badge badge-pill badge-success">Đang sử dụng</span>
			@else
			<span class="badge badge-pill badge-danger">Ngưng sử dụng</span>
			@endif
			
		</td>
		<td><div class="col-12">
				<form action="{{route('nganhxt.edit', ['id' => $nganhxt->id])}}">
					<button class="btn btn-warning btn-sm" type="submit">
						Sửa
					<span class="far fa-edit ml-1" data-fa-transform="shrink-3"></span>
					</button>
					<button class="btn btn-danger btn-sm delete-button" 
					data-action ="{{ route('nganhxt.destroy',$nganhxt->id) }}" type="button">
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