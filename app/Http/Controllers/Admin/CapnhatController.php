<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CapnhatRequest as CapnhatRequest;
use App\Admin\Capnhat;
use Session;

class CapnhatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $_capnhats= Capnhat::all();
        return view('admin.capnhat.list', ['capnhats' => $_capnhats ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.capnhat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Capnhat::create($request->all());
        Session::flash('success-capnhat', 'Tạo mới loại hình đăng kí cập nhật "  '.$request->name.' " thành công.');
        return redirect(route('capnhat.create'));
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
        $_capnhat = Capnhat::find($id);
        if (!isset($_capnhat)){
            Session::flash('error-capnhat', 'Không tìm thấy loại hình cần sửa.');
            return redirect(route('capnhat.index'));
        }

        return view('admin.capnhat.edit', ['capnhat' => $_capnhat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $_capnhat = Capnhat::find($id);
        if (!isset($_capnhat)){
            Session::flash('error-capnhat', 'Không tìm thấy loại hình cần sửa.');
            return redirect(route('capnhat.index'));
        }
        $_capnhat->update($request->all());
        Session::flash('success-capnhat', 'Thay đổi thông tin thành công.');
        return redirect(route('capnhat.edit', ['id' => $id]));
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
        $_capnhat = Capnhat::find($id);
        if (!isset($_capnhat)){
            Session::flash('error-capnhat', 'Không tìm thấy loại hình cần sửa.');
            return redirect(route('capnhat.index'));
        }
        Session::flash('success-capnhat', 'Đã xóa dữ liệu "'.$_capnhat->name. '" khỏi cơ sở dữ liệu.');
        $_capnhat->delete();
        return redirect(route('capnhat.index'));
    }
}
