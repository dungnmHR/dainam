<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\LienthongRequest as LienthongRequest;
use App\Admin\Lienthong;
use Session;

class LienthongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $_lienthongs = Lienthong::all();
        return view('admin.lienthong.list', ['lienthongs' => $_lienthongs ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.lienthong.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LienthongRequest $request)
    {
        //
        Lienthong::create($request->all());
        Session::flash('success-lienthong', 'Tạo mới loại hình liên thông  "'.$request->name.'" thành công.');
        return redirect(route('lienthong.create'));
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
        $_lienthong = Lienthong::find($id);
        if (!isset($_lienthong)){
            Session::flash('error-lienthong', 'Không tìm thấy trường cần sửa.');
            return redirect(route('lienthong.index'));
        }

        return view('admin.lienthong.edit', ['lienthong' => $_lienthong]);
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
        $_lienthong = Lienthong::find($id);
        if (!isset($_lienthong)){
            Session::flash('error-lienthong', 'Không tìm thấy trường cần sửa.');
            return redirect(route('lienthong.index'));
        }
        $_lienthong->update($request->all());
        Session::flash('success-lienthong', 'Thay đổi thông tin thành công.');
        return redirect(route('lienthong.edit', ['id' => $id]));
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
        $_lienthong = Lienthong::find($id);
        if (!isset($_lienthong)){
            Session::flash('error-lienthong', 'Không tìm thấy trường cần sửa.');
            return redirect(route('lienthong.index'));
        }
        Session::flash('success-lienthong', 'Đã xóa dữ liệu "'.$_lienthong->name. '" khỏi cơ sở dữ liệu.');
        $_lienthong->delete();
        return redirect(route('lienthong.index'));
    }
}
