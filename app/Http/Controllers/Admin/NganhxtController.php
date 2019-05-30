<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NganhxtRequest as NganhxtRequest;
use App\Admin\Nganhxt;
use App\Admin\Tohopxt;
use Session;

class NganhxtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $_nganhxts = Nganhxt::all();
        return view('admin.nganhxt.list', ['nganhxts' => $_nganhxts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $_tohopxts = Tohopxt::where('status', 1)->get();
        return view('admin.nganhxt.create', ['tohopxts' => $_tohopxts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NganhxtRequest $request)
    {
        //
        $nganhxt = new Nganhxt();
        $nganhxt->tohopxt_id = implode( ";", $request->tohopxt_id );
        $nganhxt->code = $request->code;
        $nganhxt->name = $request->name;
        $nganhxt->status = $request->status;
        $nganhxt->save();
        Session::flash('success-nganhxt', 'Tạo mới ngành xét tuyển "'.$request->name.'" thành công.');
        return redirect(route('nganhxt.create'));
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
        $_tohopxts = Tohopxt::where('status', 1)->get();
        $_nganhxt = Nganhxt::find($id);
        if (!isset($_nganhxt)){
            Session::flash('error-nganhxt', 'Không tìm thấy ngành xét tuyển cần sửa.');
            return redirect(route('nganhxt.index'));
        }

        return view('admin.nganhxt.edit', ['nganhxt' => $_nganhxt , 'tohopxts' => $_tohopxts]);
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
        $nganhxt = Nganhxt::find($id);
        if (!isset($nganhxt)){
            Session::flash('error-nganhxt', 'Không tìm thấy ngành xét tuyển cần sửa.');
            return redirect(route('nganhxt.index'));
        }
        $nganhxt->tohopxt_id = implode( ";", $request->tohopxt_id);
        $nganhxt->code = $request->code;
        $nganhxt->name = $request->name;
        $nganhxt->status = $request->status;
        $nganhxt->update();
        Session::flash('success-nganhxt', 'Thay đổi thông tin thành công.');
        return redirect(route('nganhxt.edit', ['id' => $id]));
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
        $_nganhxt = Nganhxt::find($id);
        if (!isset($_nganhxt)){
            Session::flash('error-nganhxt', 'Không tìm thấy ngành xét tuyển cần sửa.');
            return redirect(route('nganhxt.index'));
        }
        Session::flash('success-nganhxt', 'Đã xóa ngành xét tuyển "'.$_nganhxt->code. '" khỏi cơ sở dữ liệu.');
        $_nganhxt->delete();
        return redirect(route('nganhxt.index'));
    }
}
