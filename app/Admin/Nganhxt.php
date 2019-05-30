<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Tohopxt;

class Nganhxt extends Model
{
    //
    protected $fillable = [
        'code', 'name', 'tohopxt_id', 'status',
    ];

    protected $appends = ['list_tohop'];

    public function getTohopxtIdAttribute()
    {
    	$_tmp = $this->attributes['tohopxt_id'];
      	if($_tmp != null){
      		return preg_split( "/[;]+/", $_tmp );
      	}
      	return null;
    }

    public function getListTohopAttribute()
    {
    	$result = [];
    	$_tmp = $this->attributes['tohopxt_id'];
      	if($_tmp != null){
      		$_tmp_arr = preg_split( "/[;]+/", $_tmp );
      		foreach ($_tmp_arr as $key => $value) {
      			$_tohop = Tohopxt::where('id',$value)->where('status', 1)->first();
      			if($_tohop != null){
      				$result[$value] = $_tohop->code;
      			}     			
      		}
      	}
      	return $result;
    }
}
