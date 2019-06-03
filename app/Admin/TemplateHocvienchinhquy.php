<?php

namespace App\Admin;

use Maatwebsite\Excel\Concerns\WithHeadings;

class TemplateHocvienchinhquy implements WithHeadings
{
    //
    /**
     * @return Collection
     */

    public function __construct()
    {

    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'Ngày đăng kí', 
            'Họ và tên',
            'Ngày sinh',
            'Số điện thoại',
            'CMTND',
            'Địa chỉ',
            'Ngành xét tuyển',
            'Tổ hợp xét tuyển',
            'Giới tính',
            'Dân tộc',
            'Nơi sinh',
            'Khu vực ưu tiên',
            'Đối tượng ưu tiên',
            'Tỉnh/Tp',
            'Quận/Huyện',
            'Xã/Phường',           
            'Điện thoại gia đình',
            'Email',
            'Đối tác',
            'Facebook',
            'Năm tuyển sinh',

            'Tình trạng nhập học',
            'Phương thức xét tuyển',        
            'Mã phiếu báo điểm',
            'Mã giấy nhập học',
            'Ngày in giấy nhập học',
            'Điểm môn 1',
            'Điểm môn 2',
            'Điểm môn 3',
            'Tổng điểm',
            'Trường THPT',
            'Đơn xét tuyển',
            'Gửi email',
            'Gửi sms',
            'In giấy nhập học',
            'In giấy HT',
            'Học bạ',
            'Bằng CNTT',
            'Ghi chú',
            'Nguồn thông tin',
            'Ngày gọi',
            'Người gọi',
            'Lần gọi',
            'Ngày gọi lại',
            'Nội dung',
            'Tình trạng data', 
        ];
        // TODO: Implement headings() method.
    }
}
