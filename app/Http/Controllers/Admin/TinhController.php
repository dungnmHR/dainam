<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TinhRequest as TinhRequest;
use App\Admin\Tinh;
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
                $name = $line['name'];
                $code = $line['code'];
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
}
