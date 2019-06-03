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
      <button class="date-1">
        Hôm nay: <span>{{date("d/m/Y")}}</span>
      </button>
      <div class="nav-item dropdown">
        <button class="f-left btn trai nav-link pr-0" id="navbarDropdownCol" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="fas fa-users"></span><span>{{$name_type}}</span><span class="fas fa-sort-down"></span>
        </button>
      <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownCol">
        <div class="bg-white rounded-soft py-2">
          <a class="dropdown-item" href="{{route('chinh-quy.index')}}" 
          {{$flag_type == 'chinh-quy' ? "style=display:none" : ''}}>
            Học viên chính quy
          </a>
          <a class="dropdown-item" href="{{route('chinh-quy.index')}}">Học viên liên thông</a>
          <a class="dropdown-item" href="#!">Học viên ĐKH dược</a>
        </div>
      </div>
    </div>
    <div class="nav-item dropdown">
      <button class="f-left btn trai nav-link pr-0" id="navbarDropdownCms" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="fas fa-user-plus"></span> <span>Tư vấn viên</span> <span class="fas fa-sort-down"></span>
      </button>
      <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownCms">
        <div class="bg-white rounded-soft py-2">
          <a class="dropdown-item" href="#!">Nguyễn Văn A</a>
          <a class="dropdown-item" href="#!">Lê Thị H</a>
        </div>
      </div>
    </div>     
  </div>
</div>
</div>
@include('admin.partials.crm-fillter')
@include('admin.partials.crm-options')

@include('admin.partials.crm-table')
@include('admin.partials.modal-import')

@stop

@section('js')
<script src="{{asset('backend/pages/assets/js/BsMultiSelect.js')}}"></script>
<script src="{{asset('backend/pages/assets/lib/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('js/crm_list.js')}}"></script>
@endsection