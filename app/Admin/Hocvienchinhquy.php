<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Hocvienchinhquy extends Model
{
    //
    protected $fillable = [
        'mahv', 'ngaydk', 'cmt',
        'ten', 'ngaysinh', 'gioitinh',
        'dantoc', 'noisinh', 'khuvucut',
        'doituongut', 'diachi', 'tinh_id',
        'huyen_id', 'xa', 'sdt',
        'sdt_2', 'email', 'doitac_id',
        'fb', 'nam', 'ttnhaphoc','in_giaynh',
        'ptxettuyen', 'nganhxt_id', 'thxettuyen',
        'mapbd', 'magnh', 'ngaygnh',
        'diem_1', 'diem_2', 'diem_3', 'user_id',
        'tongdiem', 'truong_id', 'donxt', 'send_email', 'send_sms', 'send_giayht',
        'hocba', 'bangcntt', 'ghichu', 'nguontt_id','status',
        
    ];

    public function tinh()
    {
        return $this->belongsTo('App\Admin\Tinh', 'tinh_id', 'code');
    }

    public function huyen()
    {
        return $this->belongsTo('App\Admin\Huyen', 'huyen_id', 'code');
    }

    public function nganhxt()
    {
        return $this->belongsTo('App\Admin\Nganhxt');
    }

    public function doitac()
    {
        return $this->belongsTo('App\Admin\Doitac');
    }
}
