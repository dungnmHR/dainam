<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Doitac extends Model
{
    //
    protected $fillable = [
        'name', 'job', 'status',
    ];
    
    public function hocvienchinhquies()
    {
        return $this->hasMany('App\Admin\Hocvienchinhquy');
    }
}
