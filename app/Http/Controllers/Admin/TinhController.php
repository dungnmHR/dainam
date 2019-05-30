<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TinhRequest as TinhRequest;
use App\Admin\Tinh;
use App\Admin\Huyen;
use File;
use Rap2hpoutre\FastExcel\FastExcel;
use Excel;
use Session;

class TinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $_tinhs = Tinh::all();
        return view('admin.tinh.list', ['tinhs' => $_tinhs ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tinh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TinhRequest $request)
    {
        //
        Tinh::create($request->all());
        Session::flash('success-tinh', 'Tạo mới tỉnh "'.$request->name.'" thành công.');
        return redirect(route('tinh.create'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $_tinh = Tinh::find($id);
        if (!isset($_tinh)){
            Session::flash('error-tinh', 'Không tìm thấy tỉnh thành cần sửa.');
            return redirect(route('tinh.index'));
        }

        return view('admin.tinh.edit', ['tinh' => $_tinh]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TinhRequest $request, $id)
    {
        //
        $_tinh = Tinh::find($id);
        if (!isset($_tinh)){
            Session::flash('error-tinh', 'Không tìm thấy tỉnh thành cần sửa.');
            return redirect(route('tinh.index'));
        }
        $_tinh->update($request->all());
        Session::flash('success-tinh', 'Thay đổi thông tin thành công.');
        return redirect(route('tinh.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $_tinh = Tinh::find($id);
        if (!isset($_tinh)){
            Session::flash('error-tinh', 'Không tìm thấy tỉnh thành cần sửa.');
            return redirect(route('tinh.index'));
        }
        Session::flash('success-tinh', 'Đã xóa tỉnh "'.$_tinh->name. '" khỏi cơ sở dữ liệu.');
        $_tinh->delete();
        return redirect(route('tinh.index'));

    }

    public function import(Request $request)
    {       
        
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" ) {
            Tinh::truncate();
            $path = $request->file->getRealPath();
            (new FastExcel)->sheet(1)->import($path, function ($line) {
                $name = $line['Tỉnh'];
                $code = $line['Mã Tỉnh'];
                Tinh::create([
                    'code' => $code,
                    'name' => $name,
                    'status' => 1,
                ]);
            });
            Session::flash('success-tinh', 'File import vào cơ sở dữ liệu thành công.');  
        }else{
            Session::flash('error-tinh', 'File import không phải là file excel.');  
        }
        return redirect(route('tinh.index'));
    }

    public function autocomplete(Request $request)
    {
        $data = Tinh::where('status', 1)->pluck('name')->all();
        return response()->json($data);
    }
    public function getCodeTinh(Request $request)
    {
        $name_tinh = $request->input('query');
        $tinh = Tinh::where('status', 1)->where('name', $name_tinh)->first();
        if($tinh != null) $data = $tinh->code;
        else $data = ""; 
        return response()->json($data);
    }

    public function getDiaChi(Request $request)
    {
        $dia_chi = "Tổ 5, Thị Trấn Mù Cang Chải, Huyện Mù Cang Chải, yên bái";//$request->input('query');
        $_tmp_array = explode(",",mb_strtolower($dia_chi, 'UTF-8'));

        $_city = "";
        $_district = "";
        if ($_tmp_array != null && sizeof( $_tmp_array) > 0){
            $size = sizeof( $_tmp_array);
            $arr_district = ['quận', 'huyện', 'thị xã'];
            $arr_city = ['thành phố', 'tỉnh'];


            $_tmp_city = $_tmp_array[$size-1];
            for($i = 0; $i < sizeof($arr_city); $i++){
                $_tmp_city = str_replace($arr_city[$i], '', $_tmp_city);

            }
            $_tmp = explode(" ", $_tmp_city);
            $index = array_search('',$_tmp);
            if($index !== FALSE){
                unset($_tmp[$index]);
            };
            $_tmp_city = implode(' ', $_tmp);
           


            $_city = Tinh::whereRaw('lower(name) like (?)',["%{$_tmp_city}%"])->first();
            if($size > 1){


                $_tmp_district = $_tmp_array[$size-2];
                for($i = 0; $i < sizeof($arr_district); $i++){
                    $_tmp_district = str_replace($arr_district[$i], '', $_tmp_district);
                }
                $_tmp = explode(" ", $_tmp_district);
                $index = array_search('',$_tmp);
                if($index !== FALSE){
                    unset($_tmp[$index]);
                }
                $_tmp_district = implode(' ', $_tmp);


                $_district = Huyen::whereRaw('lower(name) like (?)',["%{$_tmp_district}%"])->first();
                if($_district != null) $_district = $_district->name;
            }
            if($_city != null) $_city = $_city->name;
        } 
        return response()->json(array('city' => $_city, 'district' => $_district));
    }
}
