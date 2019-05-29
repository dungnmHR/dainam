@extends('admin.layouts.crm-default')

@section('title')
Học viên chính quy
@parent
@stop

@section('css')
<link rel="stylesheet" href="{{asset('backend/pages/assets/css/chinhquy.css')}}">
@stop

@section('content')
<div class="container-fluid pd50">
  <div class="row">
    <div class="col-sm-6 cottrai">
      <div class="">
        <div class="but-ton">
          <button class="btn"><i class="far fa-save"></i> Lưu</button>
          <button class="btn"><i class="fas fa-trash-alt"></i> Xóa</button>
          <button class="btn btn-info btn-infile"><i class="fas fa-print"></i> In File <i class="fas fa-caret-down"></i></button>
          <button class="btn btn-danger"><i class="fas fa-mail-bulk"></i> Gửi Mail <i class="fas fa-caret-down"></i></button>
          <button class="btn btn-thoat">Thoát</button>
        </div>

        <div class="danhsach">
          <div>Danh sách:</div>
          <span>200/264</span>
        </div> <!--  end danh sán -->
        <div class="clear"></div>

      </div> <!--  end nut va d -->
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label">Mã thí sinh</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm">
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label res-sm">Ngày ĐK TT</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm date-pk" >
            </div>
          </div>
        </div>
      </div> <!--  end 1 ro -->
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label">Họ và tên</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm" >
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label res-sm">CMTND</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm" >
            </div>
          </div>
        </div>
      </div> <!--  end 1 ro -->

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label">Ngày sinh</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm date-pk" >
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label res-sm">Giới tính</label>
            <div class="col-sm-6 gt-nn">
              <input  name="gioitinh" type="radio">Nam
              <input name="gioitinh" type="radio">Nữ
            </div>
          </div>
        </div>
      </div> <!--  end 1 ro -->

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label">Nơi sinh</label>
            <div class="col-sm-6 div-sel-noisinh">
              <select class="txt-noisinh form-control">
                <option>Bà Rịa - Vũng Tàu</option>
                <option>Hà Nội</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label khuvuc-sm">Khu vực</label>
            <div class="col-sm-6 div-sel-khuvuc">
              <select class="txt-khuvuc form-control">
                <option>KV2-NT</option>
                <option>KV1-NT</option>
                <option>KV1-NT</option>
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
              <input type="text" class="form-control form-control-sm txt-diachinha" >
            </div>
          </div>
        </div>
      </div> <!--  end 1 ro -->

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label">Tỉnh/T.Phố</label>
            <div class="col-sm-6 div-sel-tinhtp">
              <select class="txt-tinhtp form-control">
                <option>Hà Nội</option>
                <option>Thanh Hóa</option>
                <option>Thái Nguyên</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group row">
                <label class="col-sm-7 col-form-label col-form-label-sm title-label">Mã Tỉnh</label>
                <div class="col-sm-5 div-sel-matinh pd00">
                  <select class="txt-matinh form-control">
                    <option>36</option>
                    <option>37</option>
                    <option>38</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group row">
                <label class="col-sm-6 col-form-label col-form-label-sm title-label txt-mahuyen">Mã Huyện</label>
                <div class="col-sm-6 div-sel-mahuyen pd00 pdr">
                  <select class="cb-mahuyen form-control">
                    <option>20</option>
                    <option>21</option>
                    <option>22</option>
                  </select>
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
              <select class="txt-quanhuyen form-control">
                <option>Thọ Xuân</option>
                <option>Nông Cống</option>
                <option>Như Thanh</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label label-xaphuong">Xã/Phường</label>
            <div class="col-sm-6 pdr">
              <input type="text" class="form-control form-control-sm" >
            </div>
          </div>
        </div>
      </div> <!--  end 1 ro -->
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label">Điện thoại</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm" >
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label">ĐT gia đinh</label>
            <div class="col-sm-6 pdr">
              <input type="text" class="form-control form-control-sm" >
            </div>
          </div>
        </div>
      </div> <!--  end 1 ro -->
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col-form-label-sm title-label">Email</label>
            <div class="col-sm-9 pd0">
              <input type="text" class="form-control form-control-sm txt-mail" >
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col-form-label-sm title-label">Facebook</label>
            <div class="col-sm-9 pd0">
              <input type="text" class="form-control form-control-sm txt-fb" >
            </div>
          </div>
        </div>
      </div> <!--  end 1 ro -->

      <div class="row">
        <div class="col-sm-9">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label col-form-label-sm title-label">Đối tác</label>
            <div class="col-sm-8 div-sel-doitac pd0">
              <select name="" id="" class="txt-doitac form-control">
                <option value="">Phạm Đình Phóng- GV Khoa Dược</option>
                <option value="">Phạm Đình Phóng- GV Khoa Dược</option>
                <option value="">Phạm Đình Phóng- GV Khoa Dược</option>
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
              <input type="text" class="form-control form-control-sm txt-nam" >

            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group row">
            <label class="col-sm-8 col-form-label col-form-label-sm title-label">Đã nhập học</label>
            <div class="col-sm-4 div-cb-dnh">
              <input type="checkbox" class="cb-nhaphoc"> 
            </div>
          </div>
        </div>
      </div> <!--  end 1 row -->

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label">Mã giấy báo NH</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm txt-magiaybaonh" >
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label">Ngày in BG NH</label>
            <div class="col-sm-6">
              <input type="text" id="txt-ngayinbgnh" class="form-control form-control-sm date-pk">
            </div>
          </div>
        </div>
      </div> <!--  end 1 row -->
      <div class="row">
        <div class="col-sm-4">
         <div class="form-group row">
          <label class="col-sm-12 col-form-label col-form-label-sm title-label txt-lhxt">Loại hình xét tuyển</label>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group row">
          <div class="col-sm-3 div-cb-xhb"><input type="radio" name="loaihinhxettuyen" class="rd-loaihinhxettuyen"></div>
          <label class="col-sm-9 col-form-label col-form-label-sm title-label lb-xhb">Xét học bạ</label>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="form-group row">
          <div class="col-sm-2 div-cb-dtqg"><input type="radio" name="loaihinhxettuyen" class="cb-dtqg"></div>
          <label class="col-sm-10 col-form-label col-form-label-sm title-label lb-dtqg">Điểm thi THPT QG</label>
        </div>
      </div>
    </div> <!--  end 1 ro -->

    <div class="row">
      <div class="col-sm-7">
        <div class="form-group row">
          <label class="col-sm-6 col-form-label col-form-label-sm title-label">Ngành DKXT</label>
          <div class="col-sm-6 div-sel-nganh">
            <select name="" id="" class="txt-nganh form-control">
              <option value="">Công nghệ thông tin</option>
              <option value="">Kế toán</option>
              <option value="">Sư phạm mầm non</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-sm-5">
        <div class="form-group row">
          <label class="col-sm-6 col-form-label col-form-label-sm title-label ">Mã ngành</label>
          <div class="col-sm-6 div-sel-manganh">
            <select name="" id="" class="txt-manganh form-control">
              <option value="">7220401</option>
              <option value="">7220440</option>
              <option value="">7100657</option>
            </select>
          </div>
        </div>
      </div>
    </div> <!--  end 1 ro -->

    <div class="row">
      <div class="col-sm-7">
        <div class="form-group row">
          <label class="col-sm-6 col-form-label col-form-label-sm title-label">Tổ hợp XT</label>
          <div class="col-sm-6 div-sel-tohop">
            <select name="" id="" class="txttohop form-control">
              <option value="">A00(Toán-Lý-Hóa)</option>
              <option value="">A1(Toán-Lý-T.anh)</option>
              <option value="">C(Văn-Sử-Địa)</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-sm-5">
        <div class="form-group row">
          <label class="col-sm-6 col-form-label col-form-label-sm title-label ">Mã PBĐ</label>
          <div class="col-sm-6">
            <input type="text" class="form-control form-control-sm txt-mapbd" >
          </div>
        </div>
      </div>
    </div> <!--  end 1 ro -->

    <div class="row">
      <div class="col-sm-3">
        <div class="form-group row">
          <label class="col-sm-6 col-form-label col-form-label-sm title-label">Điểm môn 1:</label>
          <div class="col-sm-6">
            <input type="text" class="form-control form-control-sm txt-diem" >
          </div>

        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group row">
          <label class="col-sm-6 col-form-label col-form-label-sm title-label lb-diem2">Điểm môn 2:</label>
          <div class="col-sm-6">
            <input type="text" class="form-control form-control-sm txt-diem txt-diem2" >
          </div>

        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group row">
          <label class="col-sm-6 col-form-label col-form-label-sm title-label lb-diem3">Điểm môn 3:</label>
          <div class="col-sm-6">
            <input type="text" class="form-control form-control-sm txt-diem txt-diem3" >
          </div>

        </div>
      </div>
      <div class="col-sm-3">
        <div class="form-group row">
          <label class="col-sm-6 col-form-label col-form-label-sm title-label lb-tong">Tổng:</label>
          <div class="col-sm-6">
            <input type="text" class="form-control form-control-sm txt-tongdiem" >
          </div>

        </div>
      </div>
    </div> <!--  end 1 ro -->

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group row">
         <label class="col-sm-6 col-form-label col-form-label-sm title-label ">Trường THPT</label>
         <div class="col-sm-6 div-sel-thpt">
           <select class="txt-thpt form-control">
             <option>THPT Lê Hoàn</option>
             <option>THPT Lê Lợi</option>
           </select>
         </div>
       </div>
     </div>
     <div class="col-sm-6">
      <div class="form-group row">
       <label class="col-sm-6 col-form-label col-form-label-sm title-label ">Mã Trường THPT</label>
       <div class="col-sm-6 div-sel-matruong">
         <select class="txt-matruong form-control">
           <option>123456</option>
           <option>467895</option>
         </select>
       </div>
     </div>
   </div>
 </div> <!--  end 1 ro -->

 <div class="row">
  <div class="col-sm-2">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label ">Đơn XT</label>
      <div class="col-sm-6 div-donxt">
        <input type="checkbox"> 
      </div>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label txt-hocba">Học bạ</label>
      <div class="col-sm-6 div-cb-hocba">
        <input type="checkbox"> 
      </div>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label bangcntn lb-bang">Bằng/CNTN</label>
      <div class="col-sm-6 div-cb-bang">
        <input type="checkbox" class="check-bang"> 
      </div>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label bangcntn txt-guimail">Gửi Email</label>
      <div class="col-sm-6 div-cb-guimail">
        <input type="checkbox" class="check-gui"> 
      </div>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label bangcntn txt-guisms">Gửi sms</label>
      <div class="col-sm-6 div-cb-guisms">
        <input type="checkbox" class="check-gui"> 
      </div>
    </div>
  </div>
  <div class="col-sm-2">
    <div class="form-group row">
      <label class="col-sm-6 col-form-label col-form-label-sm title-label bangcntn lb-giayht">Gửi giấy HT</label>
      <div class="col-sm-6 div-cb-guigiayht">
        <input type="checkbox" class="check-bang"> 
      </div>
    </div>
  </div>
</div> <!--  end 1 ro -->



<div class="row">
  <div class="col-sm-12">
    <div class="form-group row">
      <label class="col-sm-3 col-form-label col-form-label-sm title-label">Ghi chú</label>
      <div class="col-sm-9">
        <input type="text" class="form-control form-control-sm txt-ghichu" >
      </div>
    </div>
  </div>
</div> <!--  end 1 row -->

</div> <!--  end cot trai -->
<div class="col-sm-6">
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label">Ngày gọi</label>
        <div class="col-sm-6">
          <input id="txt-ngaygoi" type="text" name="" class="form-control form-control-sm date-pk txt-ngaygoi">
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label">Người gọi </label>
        <div class="col-sm-6 div-sel-nguoigoi pd10">
          <select class="sel-nguoigoi form-control">
            <option>Hoàng LV</option>
            <option>Pepe</option>
          </select>
        </div>
      </div>
    </div>
  </div> <!--  end 1 row -->
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label">Lần gọi</label>
        <div class="col-sm-6 div-sel-langoi">
          <select class="sel-langoi form-control">
            <option>1</option>
            <option>2</option>
          </select>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group row">
        <label class="col-sm-6 col-form-label col-form-label-sm title-label">Ngày gọi lại</label>
        <div class="col-sm-6 pd10">
          <input id="txt-ngaygoilai" type="text" name="" class="form-control form-control-sm date-pk txt-ngaygoi" >
        </div>
      </div>
    </div>
  </div> <!--  end 1 row -->

  <div class="row">
    <div class="col-sm-12">
      <div class="row form-group">
        <label class="col-sm-3 col-form-label col-form-label-sm title-label ">Nội dung tư vấn</label>
        <div class="col-sm-9 pd10">
          <input type="text" name="" class="form-control form-control-sm txttuvan">
        </div>
        <div class="col-sm-6"></div>
      </div>
    </div>
  </div> <!--  end 1 ro -->

  <div class="row">
    <div class="col-sm-12">
      <div class="form-group row">
        <label class="col-sm-3 lb-danhgiatinhtrang">Đánh giá tình trạng Data</label>
        <div class="col-sm-9 div-sel-tiemnang pd0">
          <select class="txttiemnang form-control">
            <option>A.Tiềm năng</option>
            <option>B.Không đào tạo</option>
          </select>
        </div>
      </div>
    </div>
  </div><!-- >end 1 ro -->

  <div class="comment">
    <div class="divtxt">
      <div class="txtnd avatar-user">
        <div><img class="img-up" src="nguoidung.jpg" ></div>
        <span class="txt-nguoigoi">
          Hoàng LV
        </span>
      </div>
      <div class="txtnd">
        <p class="noidungtuvan">Nội dung tư vấn: Liên lạc hứa hẹn nộp hồ sơ</p>
      </div>
    </div> <!--  end divtx -->
    <div class="divtxt">
      <div class="txtnd avatar-user">
        <div><img class="img-up" src="nguoidung.jpg" ></div>
        <span class="txt-nguoigoi">
          Hoàng LV
        </span>
      </div>
      <div class="txtnd">
        <p class="noidungtuvan">Nội dung tư vấn: Liên lạc hứa hẹn nộp hồ sơ</p>
      </div>
    </div> <!--  end divtx -->
  </div> <!--  end end -->
</div> <!--  end cot phải -->

<div class="container-fluid">
    <button type="button" class="btn btn-info btn-truoc">Trước</button>
    <button type="button" class="btn btn-info btn-sau">Sau</button>
</div> <!--  end bt -->
@include('admin.partials.crm-menu')

</div> <!--  end conatine -->
</div>
</div>

@stop

@section('js')

@endsection