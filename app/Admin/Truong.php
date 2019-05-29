<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Truong extends Model
{
    //
    protected $fillable = [
        'code', 'name', 'address', 'type', 'tinh_id', 'status',
    ];
    public function tinh()
    {
        return $this->belongsTo('App\Admin\Tinh', 'tinh_id', 'code');
    }
}
