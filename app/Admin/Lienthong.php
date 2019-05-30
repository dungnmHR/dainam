<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Lienthong extends Model
{
    //
    protected $fillable = [
        'name', 'type', 'status', // type= 1: Ngành LT, 2: Hệ LT
    ];
}
