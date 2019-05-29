@extends('admin.layouts.crm-default')

@section('title')
Danh sách học viên
@parent
@stop

@section('css')
<link href="{{asset('backend/pages/assets/lib/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
<link href="{{asset('backend/pages/assets/css/BsMultiSelect.css')}}" rel="stylesheet">
<link href="{{asset('backend/pages/assets/lib/flatpickr/flatpickr.min.css')}}" rel="stylesheet">
<link href="{{asset('backend/pages/assets/css/cms.css')}}" rel="stylesheet">
@stop

@section('content')
<div id="search-index">
  <div class="row-1">
    <div class="left-r">
      @include('admin.partials.bo-loc')
    </div>
    <div class="right-r">
      <button class="add-news f-left btn trai"><a href="{{route('bang-tin')}}">
        <span class=" fas fa-home"></span> CMS Home</a>
      </button>
      <div class="nav-item dropdown">
        <button class="f-left btn trai nav-link pr-0" id="navbarDropdownCms" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="fas fa-user-plus"></span> <span>Tạo mới học viên</span> <span class="fas fa-sort-down"></span>
        </button>
        <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownCms">
          <div class="bg-white rounded-soft py-2">
            <a class="dropdown-item" href="{{route('crm-chinh-quy')}}">Học viên chính quy</a>
            <a class="dropdown-item" href="{{route('crm-lien-thong')}}">Học viên liên thông</a>
            <a class="dropdown-item" href="{{route('crm-cap-nhat-duoc')}}">Học viên cập nhật dược</a>
          </div>
        </div>
      </div>
      <button class="date-1">
        Hôm nay: <span>24/5/2019</span>
      </button>
    </div>
  </div>
</div>

@include('admin.partials.crm-fillter')
@include('admin.partials.crm-options')
@include('admin.partials.crm-table')
@include('admin.partials.crm-chamsocvien-table')

@stop

@section('js')
<script src="{{asset('backend/pages/assets/js/BsMultiSelect.js')}}"></script>
<script src="{{asset('backend/pages/assets/lib/flatpickr/flatpickr.min.js')}}"></script>
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
  $(".flatpickr").flatpickr({
    maxDate: "today",
    dateFormat: "d/m/Y",
  });
</script>
@endsection