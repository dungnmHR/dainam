<section id="table-hv">
    <div class="title-table">
        <span>Đã chọn: <span class="count-tick">12</span></span>
    </div>
    <div class="card-data thongtin-hocvien">
      <table id="info-table" class="table table-bordered table-sm table-dashboard">
        <thead>
          <tr>
            <th><input type="checkbox" name=""></th>
            <th>Mã thí sinh</th>
            <th>Ngày đăng ký</th>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Điện thoại</th>
            <th>CMTND</th>
            <th>Ngành xét tuyển</th>
            <th>Tổ hợp xét tuyển</th>
            <th>Gửi SMS</th>
            <th>Gửi email</th>
            <th>In giấy HT</th>
            <th>In giấy NH</th>
            <th>Lần gọi</th>
            <th>Ghi chú</th>
            <th>Hẹn gọi lại</th>
            <th>Ngày gọi</th>

            <th>Dân tộc</th>
            <th>Nơi sinh</th>
            <th>Khu vực ưu tiên</th>
            <th>Đối tượng ưu tiên</th>
            <th>Địa chỉ</th>
            <th>Tỉnh/Tp</th>
            <th>Quận/Huyện</th>
            <th>Xã/Phường</th>

            <th>Điện thoại GĐ</th>
            <th>Email</th>
            <th>Đối tác</th>
            <th>Facebook</th>

            <th>Năm TS</th>
            <th>TT nhập học</th>
            <th>Mã phiếu báo điểm</th>
            <th>Mã giấy nhập học</th>
            <th>Ngày in giấy nhập học</th>

            <th>Điểm môn 1</th>
            <th>Điểm môn 2</th>
            <th>Điểm môn 3</th>
            <th>Tổng điểm</th>
            <th>Trường THPT</th>
            <th>Đơn xét tuyển</th>
        </tr>
    </thead>
    <tbody>
        @foreach($hocviens as $hocvien)
        <tr>
            <td><input type="checkbox" name=""></td>
            <td>{{$hocvien->mahv}}</td>
            <td>{{$hocvien->ngaydk}}</td>
            <td>{{$hocvien->ten}}</td>
            <td>{{$hocvien->ngaysinh}}</td>
            <td>{{$hocvien->gioitinh}}</td>
            <td>{{$hocvien->sdt}}</td>
            <td>{{$hocvien->cmt}}</td>
            <td>{{$hocvien->nganhxt_id}}</td>
            <td>{{$hocvien->thxettuyen}}</td>
            <td><input type="checkbox" name=""></td>
            <td><input type="checkbox" name=""></td>
            <td><input type="checkbox" name=""></td>
            <td><input type="checkbox" name=""></td>
            <td>Lần gọi</td>
            <td>Ghi chú</td>
            <td>Hẹn gọi lại</td>
            <td>Ngày gọi</td>

            <td>{{$hocvien->dantoc}}</td>
            <td>{{$hocvien->noisinh}}</td>
            <td>{{$hocvien->khuvucut}}</td>
            <td>{{$hocvien->doituongut}}</td>

            <td>{{$hocvien->diachi}}</td>
            <td>{{$hocvien->tinh_id}}</td>
            <td>{{$hocvien->huyen_id}}</td>
            <td>{{$hocvien->xa}}</td>

            <td>{{$hocvien->sdt_2}}</td>
            <td>{{$hocvien->email}}</td>
            <td>{{$hocvien->doitac_id}}</td>
            <td>{{$hocvien->fb}}</td>

            <td>{{$hocvien->nam}}</td>
            <td>{{$hocvien->ttnhaphoc}}</td>
            <td>{{$hocvien->mapbd}}</td>
            <td>{{$hocvien->magnh}}</td>
            <td>{{$hocvien->ngaygnh}}</td>

            <td>{{$hocvien->diem_1}}</td>
            <td>{{$hocvien->diem_2}}</td>
            <td>{{$hocvien->diem_3}}</td>
            <td>{{$hocvien->tongdiem}}</td>
            <td>{{$hocvien->truong_id}}</td>
            <td>{{$hocvien->donxt}}</td>
        </tr>
        @endforeach


    </tbody>
   <!--  <tr class="total-action">
        <td></td>
        <td></td>
        <td></td>
        <td>20</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>20</td>
        <td>20</td>
        <td>20</td>
        <td></td>
        <td>20</td>
        <td>20</td>
        <td></td>
    </tr> -->
</table>
</div>

</section>