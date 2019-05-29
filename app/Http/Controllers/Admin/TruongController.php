<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TruongRequest as TruongRequest;
use App\Admin\Tinh;
use App\Admin\Truong;
use File;
use Rap2hpoutre\FastExcel\FastExcel;
use Excel;
use Session;
class TruongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $_truongs = Truong::all();
        return view('admin.truong.list', ['truongs' => $_truongs ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $_tinhs = Tinh::where('status', 1)->get();
        return view('admin.truong.create', ['tinhs' => $_tinhs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TruongRequest $request)
    {
        //
        Truong::create($request->all());
        Session::flash('success-truong', 'Tạo mới trường '.$request->name.' thành công.');
        return redirect(route('truong.create'));
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
        $_tinhs = Tinh::where('status', 1)->get();
        $_truong = Truong::find($id);
        if (!isset($_truong)){
            Session::flash('error-truong', 'Không tìm thấy trường cần sửa.');
            return redirect(route('truong.index'));
        }

        return view('admin.truong.edit', ['tinhs' => $_tinhs, 'truong' => $_truong]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TruongRequest $request, $id)
    {
        //
        $_truong = Truong::find($id);
        if (!isset($_truong)){
            Session::flash('error-truong', 'Không tìm thấy trường thành cần sửa.');
            return redirect(route('truong.index'));
        }
        $_truong->update($request->all());
        Session::flash('success-truong', 'Thay đổi thông tin thành công.');
        return redirect(route('truong.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $_truong = Truong::find($id);
        if (!isset($_truong)){
            Session::flash('error-truong', 'Không tìm thấy trường cần sửa.');
            return redirect(route('truong.index'));
        }
        Session::flash('success-truong', 'Đã xóa trường : '.$_truong->name. ' khỏi cơ sở dữ liệu.');
        $_truong->delete();
        return redirect(route('truong.index'));
    }

    public function import(Request $request)
    {       
       
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" ) {
            Truong::truncate();
            $path = $request->file->getRealPath();
            (new FastExcel)->sheet(2)->import($path, function ($line) {
                $tinh_id = $line['Mã Tỉnh'];
                $code = $line['Mã Trường'];
                $name = $line['Tên Trường'];
                $address = $line['Địa chỉ'];
                $type = $line['Khu vực'];
                Truong::create([
                    'code' => $code,
                    'tinh_id' => $tinh_id,
                    'name' => $name,
                    'address' => $address,
                    'type' => $type,
                    'status' => 1,
                ]);
            });
            Session::flash('success-truong', 'File import vào cơ sở dữ liệu thành công.');  
        }else{
            Session::flash('error-truong', 'File import không phải là file excel.');  
        }
        return redirect(route('truong.index'));
    }
}
