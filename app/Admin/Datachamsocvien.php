<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Datachamsocvien extends Model
{
    //
    protected $fillable = [
        'hocvien_id', 'ngaygoi' ,'chamsocvien_id', 'type' 
        ,'langoi','ngaygoilai' ,'noidung', 'ttdata', 'status',
    ];
    public function user()
    {
        return $this->belongsTo('App\User', 'chamsocvien_id', 'id');
    }
}
