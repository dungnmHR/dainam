<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrmController extends Controller
{
    //
    public function createLienThong()
    {
        //
        return view('admin.crm.lien-thong');
    }
}
