@extends('admin.layouts.crm-default')

@section('title')
Học viên chính quy
@parent
@stop

@section('css')
<link rel="stylesheet" href="{{asset('backend/pages/assets/css/chinhquy.css')}}">
@stop

@section('content')
<form id="form" class="form-horizontal" role="form" action="{{route('chinh-quy.store')}}" 
      enctype="multipart/form-data" method="POST">
@csrf

<div class="container-fluid pd50">
  @include('admin.partials.error-list')
  @if(session('success-create-chinh-quy'))
    <div class="alert alert-success">
        <strong>{{session('success-create-chinh-quy')}}</strong>
    </div>
  @endif
  <div class="row">
    <div class="row">
      <div class="col-sm-6">
       <div class="but-ton">
        <button class="btn" type="submit"><i class="far fa-save"></i> Lưu</button>
        <button class="btn"><i class="fas fa-trash-alt"></i> Xóa</button>
        <button class="btn btn-info btn-infile"><i class="fas fa-print"></i> In File <i class="fas fa-caret-down"></i></button>
        <button class="btn btn-danger"><i class="fas fa-mail-bulk"></i> Gửi Mail <i class="fas fa-caret-down"></i></button>
        <button class="btn btn-thoat">Thoát</button>
      </div>
      <div class="btn-alight">
       <button type="button" class="btn btn-info btn-sau">Sau</button>
       <button type="button" class="btn btn-info btn-truoc">Trước</button>
     </div>
     <div class="danhsach">
      <div>Danh sách:</div>
      <span>{{$new_id}}/{{$last_id}}</span>
    </div> <!--  end danh sán -->
  </div>       

  <div class="clear"></div>
</div> <!--  end nut va d -->

<div class="col-sm-6 cottrai">     
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label">Mã thí sinh</label>
        <div class="col-sm-6">
          <input disabled  value="{{$mhv}}" type="text" class="form-control form-control-sm">
          <input type="hidden" name="mahv" value="{{$mhv}}" type="text" class="form-control form-control-sm">
          <input type="hidden" name="status" value=1 type="text" class="form-control form-control-sm">
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label res-sm">Ngày ĐK TT</label>
        <div class="col-sm-6">
          <input name="ngaydk" type="text" class="form-control form-control-sm date-pk" >
        </div>
      </div>
    </div>
  </div> <!--  end 1 ro -->
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label">Họ và tên</label>
        <div class="col-sm-6">
          <input name="ten" type="text" class="form-control form-control-sm">
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label res-sm">CMTND</label>
        <div class="col-sm-6">
          <input name="cmt" type="text" class="form-control form-control-sm" >
        </div>
      </div>
    </div>
  </div> <!--  end 1 ro -->

  <div class="row">
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label">Ngày sinh</label>
        <div class="col-sm-6">
          <input type="text" name="ngaysinh" class="form-control form-control-sm date-pk" >
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label res-sm">Giới tính</label>
        <div class="col-sm-6 gt-nn">
          <input  name="gioitinh" value=1 type="radio">Nam
          <input name="gioitinh" value=0 type="radio">Nữ
        </div>
      </div>
    </div>
  </div> <!--  end 1 ro -->

  <div class="row">
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label">Nơi sinh</label>
        <div class="col-sm-6 div-sel-noisinh">
          <input name="noisinh" class="form-control form-control-sm _city" type="text">
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label res-sm">Khu vực</label>
        <div class="col-sm-6">
          <select name="khuvucut" id="khuvucut" class="form-control form-control-sm check-tongdiem">
            <option value="0">Không có</option>
            <option value="1">KV1</option>
            <option value="2">KV2</option>
            <option value="3">KV2-NT</option>
            <option value="4">KV3</option>
          </select>
        </div>
      </div>
    </div>
  </div> <!--  end 1 ro -->

  <div class="row">
    <div class="col-sm-12">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label col-form-label-sm title-label">Địa chỉ nhà</label>
        <div class="col-sm-9 pd0">
          <input type="text" name="diachi" class="form-control form-control-sm txt-diachinha" id="diachinha" >
        </div>
      </div>
    </div>
  </div> <!--  end 1 ro -->

  <div class="row">
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label">Tỉnh/T.Phố</label>
        <div class="col-sm-6 div-sel-tinhtp">
          <input class="form-control form-control-sm _city" name="tinh_id" id="city" type="text">
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label">Mã Tỉnh</label>
            <div class="col-sm-6">
              <input class="form-control form-control-sm " id="city_code" disabled type="text">
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label txt-mahuyen">Mã Huyện</label>
            <div class="col-sm-6">
              <input class="form-control form-control-sm " id="district_code" disabled type="text">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!--  end 1 ro -->

  <div class="row">
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label">Huyện/Quận</label>
        <div class="col-sm-6 div-sel-huyenquan">
          <input class="form-control form-control-sm _district" name="huyen_id" id="district" type="text">
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label label-xaphuong">Xã/Phường</label>
        <div class="col-sm-6 pdr">
          <input type="text" name="xa" class="form-control form-control-sm" >
        </div>
      </div>
    </div>
  </div> <!--  end 1 ro -->
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label">Điện thoại</label>
        <div class="col-sm-6">
          <input name="sdt" type="text" class="form-control form-control-sm" >
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label">ĐT gia đinh</label>
        <div class="col-sm-6 pdr">
          <input type="text" name="sdt_2" class="form-control form-control-sm" >
        </div>
      </div>
    </div>
  </div> <!--  end 1 ro -->
  <div class="row">
    <div class="col-sm-9">
      <div class="form-group row">
        <label class="col-sm-4 col-form-label col-form-label-sm title-label">Email</label>
        <div class="col-sm-8 div-sel-doitac pd0">
          <input type="text" name="email" placeholder="example@gmail.co" class="form-control form-control-sm txt-fb" >
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-9">
      <div class="form-group row">
        <label class="col-sm-4 col-form-label col-form-label-sm title-label">Nguồn thông tin</label>
        <div class="col-sm-8 div-sel-doitac pd0">
          <select name="nguontt_id" id="nguontt_id" class="txt-doitac form-control">
            <option value="0">Truyền hình</option>
            <option value="1">Báo chí</option>
            <option value="2">Ngày hội Tuyển sinh</option>
            <option value="3">Người thân, bạn bè, thầy cô</option>
            <option value="4">Sự kiện tư vấn tuyển sinh tại trường THPT bạn theo học</option>
            <option value="5">Youtube</option>
            <option value="6">Facebook</option>
            <option value="7">Website</option>
            <option value="8">Tờ rơi</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-9">
      <div class="form-group row">
        <label class="col-sm-4 col-form-label col-form-label-sm title-label">Facebook</label>
        <div class="col-sm-8 div-sel-doitac pd0">
          <input type="text" name="fb" placeholder="https://www.facebook.com/user-name" class="form-control form-control-sm txt-fb" >
        </div>
      </div>
    </div>
  </div> <!--  end 1 ro -->

  <div class="row">
    <div class="col-sm-9">
      <div class="form-group row">
        <label class="col-sm-4 col-form-label col-form-label-sm title-label">Đối tác</label>
        <div class="col-sm-8 div-sel-doitac pd0">
          <select name="doitac_id" id="doitac_id" class="txt-doitac form-control">
           @foreach($doitacs as $doitac)
           <option value="{{$doitac->id}}" {{old('doitac_id') == $doitac->id ? 'selected' : ''}}>{{$doitac->name}}</option>
           @endforeach
          </select>
        </div>
      </div>
    </div>

    <div class="col-sm-3">
      <button class="btn btn-info btn-them" data-toggle="modal" data-target="#myModal">Thêm</button>
    </div>
  </div> <!--  end 1 row -->
  <!--   begin popu -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
          <h1 class="text-center">Mời bạn nhập tên đối tác: </h1>
          <input type="text" class="form-control form-control-sm txt-thesmoitac" >
          <button type="button" class="btn btn-info btn-thesmt">Thêm</button>
        </div>
      </div>
    </div>
  </div>
  <!--  end popu -->
  <div class="row">
    <div class="col-sm-5">
      <h3 class="txtthongtintuyensinh">Thông tin tuyển sinh</h3>
    </div>
    <div class="col-sm-3">
      <div class="form-group row">
        <label class="col-sm-4 col-form-label col-form-label-sm title-label lb-nam">Năm</label>
        <div class="col-sm-8">
          <input type="text" class="form-control form-control-sm txt-nam" value="{{date("Y")}}" disabled>
          <input type="hidden" name="nam" class="form-control form-control-sm txt-nam" value="{{date("Y")}}">
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group row">
        <label class="col-sm-8 col-form-label col-form-label-sm title-label">Đã nhập học</label>
        <div class="col-sm-4 div-cb-dnh">
          <input name="ttnhaphoc" type="checkbox" class="cb-nhaphoc"> 
        </div>
      </div>
    </div>
  </div> <!--  end 1 row -->

  <div class="row">
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label">Mã giấy báo NH</label>
        <div class="col-sm-6">
          <input name="magnh" type="text" class="form-control form-control-sm txt-magiaybaonh" >
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label">Ngày in BG NH</label>
        <div class="col-sm-6">
          <input name="ngaygnh" type="text" id="txt-ngayinbgnh" class="form-control form-control-sm date-pk">
        </div>
      </div>
    </div>
  </div> <!--  end 1 row -->
  <div class="row">
    <div class="col-sm-3">
     <div class="form-group row">
      <label class="col-sm-12 col-form-label col-form-label-sm title-label txt-lhxt">Phương thức xét tuyển</label>
    </div>
  </div>

  <div class="col-sm-3">
    <div class="form-group row">
      <div class="col-sm-3 div-cb-xhb">
        <input type="radio" value="0" checked="true" name="ptxettuyen" class="rd-loaihinhxettuyen check-tongdiem">
      </div>
      <label class="col-sm-9 col-form-label col-form-label-sm title-label lb-xhb">Xét học bạ</label>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="form-group row">
      <div class="col-sm-2 div-cb-dtqg">
        <input type="radio" value="1" name="ptxettuyen" class="cb-dtqg check-tongdiem">
      </div>
      <label class="col-sm-10 col-form-label col-form-label-sm title-label lb-dtqg">Điểm thi THPT QG</label>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="form-group row">
      <div class="col-sm-2 div-cb-dtqg">
        <input type="radio" value="2" name="ptxettuyen" class="cb-dtqg check-tongdiem">
      </div>
      <label class="col-sm-10 col-form-label col-form-label-sm title-label lb-dtqg">Xét cả 2</label>
    </div>
  </div>
</div> <!--  end 1 ro -->

<div class="row">
  <div class="col-sm-7">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label">Ngành DKXT</label>
      <div class="col-sm-6 div-sel-nganh">
        <select name="nganhxt_code" id="nganhxt_code" class="txt-nganh form-control">
          <option style="display:none;" selected>Chọn ngành xét tuyển</option>
          @foreach($nganhxts as $nganhxt)
          <option value="{{$nganhxt->code}}" {{old('nganhxt_id') == $nganhxt->id ? 'selected' : ''}}>{{$nganhxt->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="col-sm-5">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label ">Mã ngành</label>
      <div class="col-sm-6 div-sel-manganh">
        <input disabled id="manganh" type="text" class="form-control form-control-sm">
      </div>
    </div>
  </div>
</div> <!--  end 1 ro -->

<div class="row">
  <div class="col-sm-7">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label">Tổ hợp XT</label>
      <div class="col-sm-6 div-sel-nganh thxt">
        
        @include('admin.partials.tohopxt', ['data'=>[]])
      </div>
    </div>
  </div>
  <div class="col-sm-5">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label ">Mã PBĐ</label>
      <div class="col-sm-6 div-sel-manganh">
        <input  id="mapbd" type="text" class="form-control form-control-sm">
      </div>
    </div>
  </div>
</div> <!--  end 1 ro -->

<div class="row">
  <div class="col-sm-3">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label">Điểm môn 1</label>
      <div class="col-sm-6">
        <input name="diem_1" id="diem_1" value=0 type="number" class="form-control form-control-sm check-tongdiem" >
      </div>

    </div>
  </div>
  <div class="col-sm-3">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label">Điểm môn 2</label>
      <div class="col-sm-6">
        <input name="diem_2" id="diem_2" value=0 type="number" class="form-control form-control-sm check-tongdiem" >
      </div>

    </div>
  </div>
  <div class="col-sm-3">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label">Điểm môn 3</label>
      <div class="col-sm-6">
        <input name="diem_3" id="diem_3" value=0 type="number" class="form-control form-control-sm check-tongdiem" >
      </div>

    </div>
  </div>
  <div class="col-sm-3">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label">Tổng điểm</label>
      <div class="col-sm-6">
        <input disabled  id="tmp_tongdiem" type="text" class="form-control form-control-sm" >
        <input type="hidden" id="tongdiem" name="tongdiem" value=0 type="text" class="form-control form-control-sm">
      </div>

    </div>
  </div>
</div> <!--  end 1 ro -->

<div class="row">
  <div class="col-sm-5">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label">Đối tượng ưu tiên</label>
      <div class="col-sm-6">
        <select name="doituongut" id="doituongut" class="txt-nganh form-control check-tongdiem">
          <option value="0">Không có</option>
          <option value="1">01</option>
          <option value="2">02</option>
          <option value="3">03</option>
          <option value="4">04</option>
          <option value="5">05</option>
          <option value="6">06</option>
          <option value="7">07</option>
        </select>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label">Điểm ưu tiên</label>
      <div class="col-sm-6">
        <input id="diemut" disabled value=0  type="text" class="form-control form-control-sm check-tongdiem" >
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="form-group row">
     <label class="col-sm-6 col-form-label col-form-label-sm title-label ">Trường THPT</label>
     <div class="col-sm-6 div-sel-thpt">
       <input class="form-control form-control-sm _truong" name="truong_id" id="truong" type="text">
     </div>
   </div>
 </div>
 <div class="col-sm-6">
  <div class="form-group row">
   <label class="col-sm-6 col-form-label col-form-label-sm title-label ">Mã Trường THPT</label>
   <div class="col-sm-6 div-sel-matruong">
    <input class="form-control form-control-sm" id="truong_code" disabled type="text">
  </div>
</div>

</div>
</div> <!--  end 1 ro -->

<div class="row">
  <div class="col-sm-2">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label ">Đơn XT</label>
      <div class="col-sm-6 div-donxt">
        <input name="donxt" type="checkbox"> 
      </div>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label txt-hocba">Học bạ</label>
      <div class="col-sm-6 div-cb-hocba">
        <input name="hocba" type="checkbox"> 
      </div>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label bangcntn lb-bang">Bằng/CNTN</label>
      <div class="col-sm-6 div-cb-bang">
        <input name="bangcntt" type="checkbox" class="check-bang"> 
      </div>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label bangcntn txt-guimail">Gửi Email</label>
      <div class="col-sm-6 div-cb-guimail">
        <input type="checkbox" name="send_email" class="check-gui"> 
      </div>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label bangcntn txt-guisms">Gửi sms</label>
      <div class="col-sm-6 div-cb-guisms">
        <input type="checkbox" name="send_sms" class="check-gui"> 
      </div>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label bangcntn lb-giayht">Gửi giấy HT</label>
      <div class="col-sm-6 div-cb-guigiayht">
        <input type="checkbox" name="send_giayht" class="check-bang"> 
      </div>
    </div>
  </div>
</div> <!--  end 1 ro -->



<div class="row">
  <div class="col-sm-12">
    <div class="form-group row">
      <label class="col-sm-3 col-form-label col-form-label-sm title-label">Ghi chú</label>
      <div class="col-sm-9">
        <input name="ghichu" type="text" class="form-control form-control-sm txt-ghichu" >
      </div>
    </div>
  </div>
</div> <!--  end 1 row -->

</div> <!--  end cot trai -->
@include('admin.partials.chamsocvien_action')


@include('admin.partials.crm-menu')

</div> <!--  end conatine -->
</div>
</div>
</form>
@stop

@section('js')
<script type="text/javascript">
  var diachi_path = "{{route('get-dia-chi-autocomplete')}}"; 
  var city_path = "{{route('tinh-autocomplete')}}";
  var dis_path = "{{route('huyen-autocomplete')}}";
  var school_path = "{{route('truong-autocomplete')}}";
  var tophopxt_path = "{{route('get-to-hop-xt')}}"
  var get_code_city = "{{route('get-code-tinh-autocomplete')}}";
  var get_code_district = "{{route('get-code-huyen-autocomplete')}}";
  var get_code_truong = "{{route('get-code-truong-autocomplete')}}";
  $('#diachinha').change(function(){
    $.get(diachi_path, { query: $(this).val() }, function (data) {
      $('#city').val(data['city']);
      $('._district').val(data['district']);
      $.get(get_code_city, { query: $('#city').val() }, function (data) {
        $('#city_code').val(data);
      }); 
      $.get(get_code_district, { query: $('._district').val() }, function (data) {
        console.log(data);
        $('#district_code').val(data);
      });    

    });
  });
  $('._city').bind('typeahead:select', function(ev, suggestion) {
    alert(suggestion.id);
  });

  $('._city').typeahead({
    source:  function (query, process) {
      return $.get(city_path, { query: "" }, function (data) {
        return process(data);
      });
    }
  });

  $('._district').typeahead({
    source:  function (query, process) {
      return $.get(dis_path, { query : $('#city').val() }, function (data) {
        return process(data);
      });
    }
  });

  $('._truong').typeahead({
    source:  function (query, process) {
      return $.get(school_path, { query : $('#city').val() }, function (data) {
        return process(data);
      });
    }
  });

  $('#city').change(function(){
    $.get(get_code_city, { query: $(this).val() }, function (data) {
      $('#city_code').val(data);
    });

  });
  $('#district').change(function(){
    $.get(get_code_district, { query: $(this).val() }, function (data) {
      $('#district_code').val(data);
    });

  });

  $('#truong').change(function(){
    $.get(get_code_truong, { query: $(this).val() }, function (data) {
      console.log(data);
      $('#truong_code').val(data);
    });

  });

  $('#nganhxt_code').on('change', function (e) {
    var nganhxt_code = $(this).val();
    $('#manganh').val(nganhxt_code);
    $.get(tophopxt_path, { query: nganhxt_code }, function (data) {
      $('.thxt').empty().html(data);   
    });

  });

  $('.check-tongdiem').on('change', function (e) {
    //diem ut
    _doituong_ut = $('#doituongut').val();
    _diem_ut = 0;
    _diem_khuvuc = 0;
    _diem_1 = parseFloat($('#diem_1').val());
    _diem_2 = parseFloat($('#diem_2').val());
    _diem_3 = parseFloat($('#diem_3').val());
    _tong_diem = 0;
    switch(_doituong_ut) {
      case '1':
        _diem_ut = 2;
        break;
      case '2':
        _diem_ut = 2;
        break;
      case '3':
        _diem_ut = 2;
        break;
      case '4':
        _diem_ut = 2;
        break;
      case '5':
        _diem_ut = 1;
        break;
      case '6':
        _diem_ut = 1;
        break;
      case '7':
        _diem_ut = 1;
        break;

      default:
         _diem_ut = 0;
        break;
      }
    $('#diemut').val(_diem_ut);

    _khuvuc_ut = $('#khuvucut').val();
    switch(_khuvuc_ut) {
      case '1':
        _diem_khuvuc = 0.75;
        break;
      case '2':
        _diem_khuvuc = 0.25;
        break;
      case '3':
        _diem_khuvuc = 0.5;
        break;
      case '4':
        _diem_khuvuc = 1;
        break;
      default:
         _diem_khuvuc = 0;
        break;
    }
    _pt_xt = $('input[name=ptxettuyen]:checked').val();
    switch(_pt_xt) {
      case '0':
        _tong_diem = _diem_1 + _diem_2 + _diem_3;
        break;
      case '1':
        _tong_diem = _diem_1 + _diem_2 + _diem_3 + parseFloat(_diem_khuvuc) + parseFloat(_diem_ut);
        break;
      case '2':
        _tong_diem = _diem_1 + _diem_2 + _diem_3 + parseFloat(_diem_khuvuc) + parseFloat(_diem_ut);
        break;
      default:
        _tong_diem = 0;
        break;
    }
    $('#tongdiem').val(_tong_diem);
    $('#tmp_tongdiem').val(_tong_diem);
  });
</script>
@endsection