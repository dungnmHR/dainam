<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Capnhat extends Model
{
    //
    protected $fillable = [
        'name', 'status', // type= 1: Ngành LT, 2: Hệ LT
    ];
}
