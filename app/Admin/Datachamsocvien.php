<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Datachamsocvien extends Model
{
    //
    protected $fillable = [
        'hocvien_id', 'ngaygoi' ,'chamsocvien_id' 
        ,'langoi','ngaygoilai' ,'noidung', 'ttdata', 'status',
    ];
}
