<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Huyen extends Model
{
    //
    protected $fillable = [
        'code', 'name', 'tinh_id', 'status',
    ];

    public function tinh()
    {
        return $this->belongsTo('App\Admin\Tinh', 'tinh_id', 'code');
    }

    public function hocvienchinhquies()
    {
        return $this->hasMany('App\Admin\Hocvienchinhquy','huyen_id', 'code');
    }
}
