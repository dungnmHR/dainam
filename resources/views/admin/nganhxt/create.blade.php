@extends('admin.layouts.default')

@section('title')
Thêm mới: Ngành xét tuyển
@parent
@stop

@section('css')
<link href="{{asset('backend/pages/assets/css/BsMultiSelect.css')}}" rel="stylesheet">
<style type="text/css">
.dashboardcode-bsmultiselect li.badge {
    background: #eca805;
    padding: 0 10px !important;
    margin-right: 2px;
    padding-top: 4px !important;
    font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    color: #000;
}
</style>
@stop

@section('content')
<!-- HEADER POST -->
<div class="card mb-3">
  <div class="card-body">
    <div class="row">
      <div class="col-lg-8">
        <h3 class="mb-0">Thêm mới: Ngành xét tuyển</h3>
      </div>
    </div>
  </div>
</div>

<!-- MESSAGE PAGE -->
@include('admin.partials.error-list')
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
                <form id="form" class="form-horizontal" role="form" action="{{route('nganhxt.store')}}" 
                enctype="multipart/form-data" method="POST">
                @csrf
                    <div class="form-group">
	                      <label for="name">Mã ngành</label>
	                      <input class="form-control" value="{{old('code')}}" name="code" id="code" type="text" placeholder="TD1730" required>
                    </div>

                    <div class="form-group">
	                      <label for="job">Tên ngành</label>
	                      <input class="form-control" value="{{old('name')}}" name="name" id="name" type="text" placeholder="Công nghệ thông tin" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Tổ hợp xét tuyển</label>
                        <select name="tohopxt_id[]" id="example-s" class="form-control"  multiple="multiple" style="display: none;">
                           @foreach($tohopxts as $tohopxt)
                           <option value={{$tohopxt->id}}>{{$tohopxt->code}}( {{$tohopxt->content}} )</option>
                           @endforeach
                        </select>
                    </div>

                    <div class="form-group">
	                    <label for="status">Trạng thái</label>
	                    <select class="form-control" id="status" name="status" required>
	                        <option value="1" {{old('status') == 1 ? 'selected' : ''}}>Sử dụng</option>
	                        <option value="0" {{old('status') == 0 ? 'selected' : ''}}>Không sử dụng</option>
	                     </select>
                    </div>
                    <div class="form-group">
                    <button class="btn btn-primary mb-3" type="submit">Tạo mới</button>
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
<script src="{{asset('backend/pages/assets/js/BsMultiSelect.js')}}"></script>
<script>
  $("select[multiple='multiple']").bsMultiSelect({
              selectedPanelDefMinHeight: 'calc(2.25rem + 2px)',  // default size
              selectedPanelLgMinHeight: 'calc(2.875rem + 2px)',  // LG size
              selectedPanelSmMinHeight: 'calc(1.8125rem + 2px)', // SM size
              selectedPanelDisabledBackgroundColor: '#e9ecef',   // disabled background
              selectedPanelFocusBorderColor: '#80bdff',          // focus border
              selectedPanelFocusBoxShadow: '0 0 0 0.2rem rgba(0, 123, 255, 0.25)',  // foxus shadow
              selectedPanelFocusValidBoxShadow: '0 0 0 0.2rem rgba(40, 167, 69, 0.25)',  // valid foxus shadow
              selectedPanelFocusInvalidBoxShadow: '0 0 0 0.2rem rgba(220, 53, 69, 0.25)',  // invalid foxus shadow
              inputColor: '#495057', // color of keyboard entered text
              selectedItemContentDisabledOpacity: '.65' // btn disabled opacity used
            });
</script>
@endsection