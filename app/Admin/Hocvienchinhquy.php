<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Tinh;
use App\Admin\Datachamsocvien;
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
    protected $appends = ['name_noisinh', 'data_chamsocvien'];
    
    public function getNameNoisinhAttribute()
    {
        $_tmp = $this->attributes['noisinh'];
        if($_tmp != null){
            $tinh = Tinh::where('code',  $_tmp)->first();
            if($tinh != null) return  $tinh->name;
        }
    }

    public function getDataChamsocvienAttribute()
    {
        $_hoc_vien_id = $this->attributes['id'];
        if ($_hoc_vien_id != null) {
            $_tmp = Datachamsocvien::orderby('id', 'DESC')
            ->where('hocvien_id', $_hoc_vien_id)->where('type', 1)->first();        
            return $_tmp;
        }
        return null;
       
    }

    public function tinh()
    {
        return $this->belongsTo('App\Admin\Tinh', 'tinh_id', 'code');
    }

    public function huyen()
    {
        return $this->belongsTo('App\Admin\Huyen', 'huyen_id', 'id');
    }

    public function truong()
    {
        return $this->belongsTo('App\Admin\Truong');
    }

    public function nganhxt()
    {
        return $this->belongsTo('App\Admin\Nganhxt');
    }
    public function tohopxt()
    {
        return $this->belongsTo('App\Admin\Tohopxt','thxettuyen');
    }

    public function doitac()
    {
        return $this->belongsTo('App\Admin\Doitac');
    }

    public function datachamsochocviens()
    {
        return $this->hasMany('App\Admin\Datachamsochocvien','hocvien_id', 'id');
    }
}
