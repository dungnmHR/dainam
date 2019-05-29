<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Tohopxt extends Model
{
    //
    protected $fillable = [
        'code', 'content', 'status',
    ];
    public function nganhxt()
    {
        return $this->hasMany('App\Admin\Nganhxt', 'tohopxt_id');
    }
}
