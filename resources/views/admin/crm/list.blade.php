@extends('admin.layouts.crm-default')

@section('title')
Danh sách học viên
@parent
@stop

@section('css')
<link href="{{asset('backend/pages/assets/lib/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
<link href="{{asset('backend/pages/assets/css/BsMultiSelect.css')}}" rel="stylesheet">
<link href="{{asset('backend/pages/assets/lib/flatpickr/flatpickr.min.css')}}" rel="stylesheet">
<link href="{{asset('backend/pages/assets/css/bootstrap-multiselect.css')}}" rel="stylesheet">
<link href="{{asset('backend/pages/assets/css/cms.css')}}" rel="stylesheet">
@stop

@section('content')
<div id="search-index">
  <div class="row-1">
    <div class="left-r">
      @include('admin.partials.bo-loc')
    </div>
    <div class="right-r">
      <select class="date-1" id="f_date">
        <option value="0" selected>Hôm nay: <span>{{date("d/m/Y")}}</span></option>
        <option value="1">Hôm qua</option>
        <option value="2">7 ngày qua</option>
        <option value="3">14 ngày qua</option>
        <option value="4">30 ngày qua</option>
        <option value="5">Tuần này</option>
        <option value="6">Tuần trước</option>
        <option value="7">Tháng này</option>
        <option value="8">Tháng trước</option>

      
      </select>
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
        <span class="fas fa-user"></span> <span>{{isset($tuvanvien) ? $tuvanvien->name : 'Tư vấn viên'}}</span> <span class="fas fa-sort-down"></span>
      </button>
      <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownCms">
        <div class="bg-white rounded-soft py-2">
          <a class="dropdown-item" href="{{route('get-chinhquy-by-user',['id'=>0])}}">
            Tất cả
          </a>
          @foreach($chamsocviens as $chamsovien)
            <a {{(isset($tuvanvien) && ($tuvanvien->id == $chamsovien->id) ) ? "style=display:none" : ''}} 
            class="dropdown-item" href="{{route('get-chinhquy-by-user',['id'=>$chamsovien->id])}}">
            {{$chamsovien->name}}</a>
          @endforeach   
        </div>
      </div>
    </div>     
  </div>
</div>
</div>
@include('admin.partials.crm-fillter')
@include('admin.partials.crm-options')

<section id="table-hv">
    <div class="title-table">
        <span>Đã chọn: <span class="count-tick">0</span></span>
    </div>
    <div class="card-data thongtin-hocvien">
      <table id="info-table" class="table table-bordered table-sm table-dashboard">
      @include('admin.partials.crm-table')
      </table>
    </div>
</section>

@include('admin.partials.modal-import')
@include('admin.partials.crm-modal-delete')
@include('admin.partials.crm-attach-modal')
@include('admin.partials.crm-warning-alert')
@stop

@section('js')
<script src="{{asset('backend/pages/assets/js/BsMultiSelect.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/pages/assets/js/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('backend/pages/assets/lib/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('js/crm_list.js')}}"></script>
<script src="{{asset('js/date-format.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var get_cotcanxem = "{{route('get-cotcanxem')}}";
    $('#_choncot').multiselect();

    $('#_choncot').change(function() {
      _data = $(this).val();
      $.get(get_cotcanxem, { query: _data }, function (data) {
          $('#info-table').empty().html(data);
      });
    });
    data_fillter = $('#data_fillter').val();
    $('#data_fillter').change(function() {
       data_fillter = $('#data_fillter').val();

    });
    var get_fillter_path = "{{route('get-fillter-cq')}}";
    data_fillter = $('#data_fillter').val();
    $('#boloc').typeahead({
      source:  function (query, process) {
        return $.get(get_fillter_path, { query: data_fillter }, function (data) {
          console.log(data);
          return process(data);
        });
      }
    });


  });
</script>
@endsection