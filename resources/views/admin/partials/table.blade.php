@extends('admin.layouts.default')


@section('css')

@stop
@yield('css-table')

@section('content')
@include('admin.partials.top-table')
@yield('message-status')
<div class="card mb-3">
	<div class="card-header">
		<form action="{{$url_add_new}}">
			<button class="btn btn-primary mr-1 mb-1" type="submit">
				<span class="fas fa-plus mr-1"data-fa-transform="shrink-3"></span>Thêm mới
			</button>
		</form>		
	</div>
	<div class="card-body bg-light">
		<div class="row">
			<div class="col-12">
				<table class="table table-sm table-dashboard data-table display responsive no-wrap mb-0 fs--1 w-100">
					<thead class="bg-200">
						<tr>
							@yield('t-head')
						</tr>
					</thead>
					<tbody class="bg-white">
						@yield('t-body')						
					</tbody>
				</table>
			</div>
		</div>
	</div>	
</div>
@include('admin.partials.modal-delete')
@stop

@section('js')

@stop
