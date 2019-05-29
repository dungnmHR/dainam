<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Nganhxt extends Model
{
    //
    protected $fillable = [
        'code', 'name', 'tohopxt_id', 'status',
    ];
    public function tohopxt()
    {
        return $this->belongsTo('App\Admin\Tohopxt', 'tohopxt_id');
    }
}
