<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TohopxtRequest as TohopxtRequest;
use App\Admin\Tohopxt;
use Session;
class TohopxtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $_tohopxts = Tohopxt::all();
        return view('admin.tohopxt.list', ['tohopxts' => $_tohopxts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tohopxt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TohopxtRequest $request)
    {
        //
        Tohopxt::create($request->all());
        Session::flash('success-tohopxt', 'Tạo mới tổ hợp xét tuyển '.$request->name.' thành công.');
        return redirect(route('tohopxt.create'));
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
        $_tohopxt = Tohopxt::find($id);
        if (!isset($_tohopxt)){
            Session::flash('error-tohopxt', 'Không tìm thấy tổ hợp xét tuyển cần sửa.');
            return redirect(route('tohopxt.index'));
        }

        return view('admin.tohopxt.edit', ['tohopxt' => $_tohopxt]);
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
        $_tohopxt = Tohopxt::find($id);
        if (!isset($_tohopxt)){
            Session::flash('error-tohopxt', 'Không tìm thấy tổ hợp xét tuyển cần sửa.');
            return redirect(route('tohopxt.index'));
        }
        $_tohopxt->update($request->all());
        Session::flash('success-tohopxt', 'Thay đổi thông tin thành công.');
        return redirect(route('tohopxt.edit', ['id' => $id]));
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
        $_tohopxt = Tohopxt::find($id);
        if (!isset($_tohopxt)){
            Session::flash('error-tohopxt', 'Không tìm thấy tổ hợp xét tuyển cần xóa.');
            return redirect(route('tohopxt.index'));
        }
        Session::flash('success-tohopxt', 'Đã xóa tổ hợp xét tuyển : '.$_tohopxt->code. ' khỏi cơ sở dữ liệu.');
        $_tohopxt->delete();
        return redirect(route('tohopxt.index'));
    }
}
