@extends('admin.partials.table')

@section('title')
Danh sách: Tổ hợp xét tuyển
@parent
@stop

@section('css')
@stop

@section('content-table')
	@section('title-table')
	Danh sách: Tổ hợp xét tuyển
	@stop

	<!-- MESSAGE PAGE -->
	@section('message-status')
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
	@stop

	@section('t-head')
	<th>Mã tổ hợp</th>
	<th>Nội dung</th>
	<th>Trạng thái</th>
	<th></th>
	@stop

	@section('t-body')
	@foreach($tohopxts as $tohopxt)
	<tr>
		<td>{{$tohopxt->code}}</td>
		<td>{{$tohopxt->content}}</td>
		<td>
			@if($tohopxt->status == 1)
			<span class="badge badge-pill badge-success">Đang sử dụng</span>
			@else
			<span class="badge badge-pill badge-danger">Ngưng sử dụng</span>
			@endif
			
		</td>
		<td><div class="col-12">
				<form action="{{route('tohopxt.edit', ['id' => $tohopxt->id])}}">
					<button class="btn btn-warning btn-sm" type="submit">
						Sửa
					<span class="far fa-edit ml-1" data-fa-transform="shrink-3"></span>
					</button>
					<button class="btn btn-danger btn-sm delete-button" 
					data-action ="{{ route('tohopxt.destroy',$tohopxt->id) }}" type="button">
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