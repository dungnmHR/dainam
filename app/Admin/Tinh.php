<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
    //
    protected $fillable = [
        'code', 'name', 'status',
    ];

    public function huyens()
    {
        return $this->hasMany('App\Admin\Huyen', 'tinh_id', 'code');
    }

    public function truongs()
    {
        return $this->hasMany('App\Admin\Truong', 'tinh_id', 'code');
    }
    public function hocvienchinhquies()
    {
        return $this->hasMany('App\Admin\Hocvienchinhquy','tinh_id', 'code');
    }
}
