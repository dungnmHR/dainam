@extends('admin.layouts.crm-default')

@section('title')
Học viên cập nhật dược
@parent
@stop

@section('css')
<link rel="stylesheet" href="{{asset('backend/pages/assets/css/capnhatduoc.css')}}">
@stop

@section('content')
<div class="container-fluid pd50">
  <div class="row">
    <div class="col-sm-6 cottrai">
      <div class="">
        <div class="but-ton">
          <button class="btn"><i class="far fa-save"></i> Lưu</button>
          <button class="btn"><i class="fas fa-trash-alt"></i> Xóa</button>
          <button class="btn btn-info"><i class="fas fa-print"></i> In File <i class="fas fa-caret-down"></i></button>
          <button class="btn btn-danger"><i class="fas fa-mail-bulk"></i> Gửi Mail <i class="fas fa-caret-down"></i></button>
          <button class="btn">Thoát</button>
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
              <input type="text" class="form-control form-control-sm" >
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label ">Ngày Đăng Ký TT</label>
            <div class="col-sm-6 pd10">
              <input id="txt-ngaydangky" type="text" class="form-control form-control-sm date-pk" >
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
            <label class="col-sm-6 col-form-label col-form-label-sm title-label ">CMTND</label>
            <div class="col-sm-6 pd10">
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
            <label class="col-sm-6 col-form-label col-form-label-sm title-label ">Giới tính</label>
            <div class="col-sm-6">
              <input name="gioitinh" type="radio">Nam
              <input name="gioitinh" type="radio">Nữ
            </div>
          </div>
        </div>
      </div> <!--  end 1 ro -->

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col-form-label-sm title-label">Nơi sinh</label>
            <div class="col-sm-9 pd0">
              <select class="form-control">
                <option>Bà Rịa - Vũng Tàu</option>
                <option>Hà Nội</option>
              </select>
            </div>
          </div>
        </div>
      </div> <!--  end 1 ro -->

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col-form-label-sm title-label">Địa chỉ</label>
            <div class="col-sm-9 pd0">
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
            <div class="col-sm-6 pd10">
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
              <input type="text" class="form-control form-control-sm" >
            </div>
          </div>
        </div>
      </div> <!--  end 1 ro -->

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col-form-label-sm title-label">Loại hình đăng ký cập nhật</label>
            <div class="col-sm-9 pd0">
              <select class="form-control">
                <option>Nhà thuốc</option>
                <option>Shop thuốc</option>
              </select>
            </div>
          </div>
        </div>
      </div> <!--  end 1 ro -->

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label">CCHN số</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm" >
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label">Ngày cấp</label>
            <div class="col-sm-6 pd10">
              <input type="text" class="form-control form-control-sm date-pk">
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-9">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label col-form-label-sm title-label">Đối tác</label>
            <div class="col-sm-8 pd0">
              <select name="" id="" class="sel-doitac form-control">
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
              <input type="text" class="form-control form-control-sm txt-nhapdoitac" >
              <button type="button" class="btn btn-info btn-themdt">Thêm</button>
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
            <div class="col-sm-4">
              <input type="checkbox" class="cb-danhaphoc"> 
            </div>
          </div>
        </div>
      </div> <!--  end 1 row -->

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-9 col-form-label col-form-label-sm title-label">Đã mua hồ sơ học cập nhật</label>
            <div class="col-sm-3 div-cb-danhaphoc">
              <input type="checkbox">
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label lb-ngaynhaphoc">Ngày nhập học</label>
            <div class="col-sm-6 pd10">
              <input id="txt-ngaynhaphoc" type="text" class="form-control form-control-sm date-pk">
            </div>
          </div>
        </div>
      </div> <!--  end 1 row -->

      <div class="row">
        <div class="col-sm-5">
          <div class="form-group row">
            <label class="col-sm-7 col-form-label col-form-label-sm title-label">Phiếu đăng ký</label>
            <div class="col-sm-5">
              <input type="checkbox">
            </div>
          </div>
        </div>
        <div class="col-sm-7">
          <div class="form-group row">
            <label class="col-sm-8 col-form-label col-form-label-sm title-label">CCHN Dược công chứng</label>
            <div class="col-sm-4">
              <input type="checkbox" name="">
            </div>
          </div>
        </div>
      </div> <!--  end 1 ro -->

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-7 col-form-label col-form-label-sm title-label">CMND công chứng</label>
            <div class="col-sm-5">
              <input type="checkbox" name="">
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label col-form-label-sm title-label">3 ảnh 4x6</label>
            <div class="col-sm-8">
              <input type="checkbox" name="">
            </div>
          </div>
        </div>
      </div> <!--  end 1 ro -->
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label col-form-label-sm title-label">Ghi chú</label>
            <div class="col-sm-9 pd0">
              <input type="text" class="form-control form-control-sm" >
            </div>
          </div>
        </div>
      </div> <!--  end 1 row -->

    </div> <!--  end cot tra -->
    <div class="col-sm-6">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label">Ngày gọi</label>
            <div class="col-sm-6">
              <input id="txt-ngaygoi" type="text" name="" class="form-control form-control-sm date-pk">
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group row">
            <label class="col-sm-6 col-form-label col-form-label-sm title-label">Người gọi </label>
            <div class="col-sm-6 pd10">
              <select class="form-control">
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
            <div class="col-sm-6">
              <select class="form-control">
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
              <input id="txt-ngaygoilai" type="text" name="" class="form-control form-control-sm date-pk" >
            </div>
          </div>
        </div>
      </div> <!--  end 1 row -->

      <div class="row">
        <div class="col-sm-12">
          <div class="row form-group">
            <label class="col-sm-3 col-form-label col-form-label-sm title-label">Nội dung tư vấn</label>
            <div class="col-sm-9 pd0">
              <input type="text" name="" class="form-control form-control-sm txt-noidungtuvan">
            </div>
            <div class="col-sm-6"></div>
          </div>
        </div>
      </div> <!--  end 1 ro -->

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group row">
            <label class="col-sm-3">Đánh giá tình trạng Data</label>
            <div class="col-sm-9 pd0">
              <select class="sel-dgttdata form-control">
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
            <span>
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
            <span>
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