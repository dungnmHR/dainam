<?php

use Illuminate\Database\Seeder;
use App\Admin\Infotable;

class TableChinhquySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Infotable::create([
            'code' => 'mahv',
            'name' => 'Mã học viên',
            'type' => '1',
            'is_default' => 1,
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'ngaydk',
            'name' => 'Ngày đăng kí',
            'type' => '1',
            'is_default' => 1,
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'ten',
            'name' => 'Họ và tên',
            'type' => '1',
            'option_sum' => 1,
            'is_default' => 1,
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'gioitinh',
            'name' => 'Giới tính',
            'type' => '1',
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'ngaysinh',
            'name' => 'Ngày sinh',
            'is_default' => 1,
            'type' => '1',
            'status' => 1,
        ]);
        
        Infotable::create([
            'code' => 'cmt',
            'name' => 'CMTND',
            'type' => '1',
            'is_default' => 1,
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'sdt',
            'name' => 'Số điện thoại',
            'is_default' => 1,
            'type' => '1',
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'nganhxt_id',
            'name' => 'Ngành xét tuyển',
            'type' => '1',
            'is_default' => 1,
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'thxettuyen',
            'name' => 'Tổ hợp xét tuyển',
            'type' => '1',
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'send_email',
            'name' => 'Gửi email',
            'type' => '1',
            'option_sum' => 1,
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'send_sms',
            'name' => 'Gửi SMS',
            'type' => '1',
            'option_sum' => 1,
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'send_giayht',
            'name' => 'Gửi giấy hoàn thiện',
            'type' => '1',
            'option_sum' => 1,
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'in_giaynh',
            'name' => 'In giấy nhập học',
            'type' => '1',
            'option_sum' => 1,
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'langoi',
            'name' => 'Lần gọi',
            'type' => '1',
            'type_data' => 1,
            'get_data' => '',
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'ghichu',
            'name' => 'Ghi chú',
            'type' => '1',
            'option_sum' => 1,
            'status' => 1,
        ]);


        Infotable::create([
            'code' => 'noidung',
            'name' => 'Nội dung',
            'type' => '1',
            'type_data' => 1,
            'get_data' => '',
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'ngaygoilai',
            'name' => 'Ngày gọi lại',
            'type' => '1',
            'option_sum' => 1,
            'type_data' => 1,
            'get_data' => '',
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'dantoc',
            'name' => 'Dân tộc',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'noisinh',
            'name' => 'Nơi sinh',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'khuvucut',
            'name' => 'Khu vực ưu tiên',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'doituongut',
            'name' => 'Đối tượng ưu tiên',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'diachi',
            'name' => 'Địa chỉ',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'tinh_id',
            'name' => 'Tỉnh/Tp',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'huyen_id',
            'name' => 'Quận/Huyện',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'xa',
            'name' => 'Xã/Phường',
            'type' => '1',
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'sdt_2',
            'name' => 'Điện thoại gia đình',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'email',
            'name' => 'Email',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'doitac_id',
            'name' => 'Đối tác',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'fb',
            'name' => 'Facebook',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'nam',
            'name' => 'Năm tuyển sinh',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'ttnhaphoc',
            'name' => 'Tình trạng nhập học',
            'type' => '1',
            'status' => 1,
        ]);
       
        Infotable::create([
            'code' => 'ptxettuyen',
            'name' => 'Phương thức xét tuyển',
            'type' => '1',
            'status' => 1,
        ]);
        
        Infotable::create([
            'code' => 'mapbd',
            'name' => 'Mã phiếu báo điểm',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'magnh',
            'name' => 'Mã giấy nhập học',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'ngaygnh',
            'name' => 'Ngày nhập học',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'diem_1',
            'name' => 'Điểm môn 1',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'diem_2',
            'name' => 'Điểm môn 2',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'diem_3',
            'name' => 'Điểm môn 3',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'tongdiem',
            'name' => 'Tổng điểm',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'truong_id',
            'name' => 'Trường THPT',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'donxt',
            'name' => 'Đơn xét tuyển',
            'type' => '1',
            'status' => 1,
        ]);
       
        Infotable::create([
            'code' => 'hocba',
            'name' => 'Học bạ',
            'type' => '1',
            'status' => 1,
        ]);
        Infotable::create([
            'code' => 'bangcntt',
            'name' => 'Bằng CNTT',
            'type' => '1',
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'nguontt_id',
            'name' => 'Nguồn thông tin',
            'type' => '1',
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'ngaygoi',
            'name' => 'Ngày gọi',
            'type' => '1',
            'type_data' => 1,
            'get_data' => '',
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'chamsocvien_id',
            'name' => 'Người gọi',
            'type' => '1',
            'type_data' => 1,
            'get_data' => '',
            'status' => 1,
        ]);

        Infotable::create([
            'code' => 'ttdata',
            'name' => 'Tình trạng data',
            'type' => '1',
            'type_data' => 1,
            'get_data' => '',
            'status' => 1,
        ]);
    }
}
