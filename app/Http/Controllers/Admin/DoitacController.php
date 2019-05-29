<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoitacRequest as DoitacRequest;
use App\Admin\Doitac;
use Session;

class DoitacController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $_doitacs = Doitac::all();
        return view('admin.doitac.list', ['doitacs' => $_doitacs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.doitac.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoitacRequest $request)
    {
        //
        Doitac::create($request->all());
        Session::flash('success-doitac', 'Tạo mới đối tác '.$request->name.' thành công.');
        return redirect(route('doitac.create'));
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
        $_doitac = Doitac::find($id);
        if (!isset($_doitac)){
            Session::flash('error-doitac', 'Không tìm thấy đối tác cần sửa.');
            return redirect(route('doitac.index'));
        }

        return view('admin.doitac.edit', ['doitac' => $_doitac]);
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
        $_doitac = Doitac::find($id);
        if (!isset($_doitac)){
            Session::flash('error-doitac', 'Không tìm thấy đối tác cần sửa.');
            return redirect(route('doitac.index'));
        }
        $_doitac->update($request->all());
        Session::flash('success-doitac', 'Thay đổi thông tin thành công.');
        return redirect(route('doitac.edit', ['id' => $id]));
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
        $_doitac = Doitac::find($id);
        if (!isset($_doitac)){
            Session::flash('error-doitac', 'Không tìm thấy đối tác cần sửa.');
            return redirect(route('doitac.index'));
        }
        Session::flash('success-doitac', 'Đã xóa đối tác : '.$_doitac->name. ' khỏi cơ sở dữ liệu.');
        $_doitac->delete();
        return redirect(route('doitac.index'));

    }
}
