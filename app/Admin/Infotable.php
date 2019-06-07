<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Infotable extends Model
{
    //
    protected $fillable = [
        'code', 'name', 'type', 'type_data', 'get_data', 'option_sum', 'is_default', 'status',
    ];
}
