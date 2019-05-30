<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HuyenRequest as HuyenRequest;
use App\Admin\Tinh;
use App\Admin\Huyen;
use File;
use Rap2hpoutre\FastExcel\FastExcel;
use Excel;
use Session;
class HuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $_huyens = Huyen::all();
        return view('admin.huyen.list', ['huyens' => $_huyens ]);
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
        return view('admin.huyen.create', ['tinhs' => $_tinhs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HuyenRequest $request)
    {
        //
        Huyen::create($request->all());
        Session::flash('success-huyen', 'Tạo mới quận\huyện "'.$request->name.'" thành công.');
        return redirect(route('huyen.create'));
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
        $_huyen = Huyen::find($id);
        if (!isset($_huyen)){
            Session::flash('error-huyen', 'Không tìm thấy quận\huyện cần sửa.');
            return redirect(route('huyen.index'));
        }

        return view('admin.huyen.edit', ['tinhs' => $_tinhs, 'huyen' => $_huyen]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HuyenRequest $request, $id)
    {
        //
        $_huyen = Huyen::find($id);
        if (!isset($_huyen)){
            Session::flash('error-huyen', 'Không tìm thấy quận\huyện cần sửa.');
            return redirect(route('huyen.index'));
        }
        $_huyen->update($request->all());
        Session::flash('success-huyen', 'Thay đổi thông tin thành công.');
        return redirect(route('huyen.edit', ['id' => $id]));
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
        $_huyen = Huyen::find($id);
        if (!isset($_huyen)){
            Session::flash('error-huyen', 'Không tìm thấy quận\huyện cần sửa.');
            return redirect(route('huyen.index'));
        }
        Session::flash('success-huyen', 'Đã xóa quận\huyện "'.$_huyen->name. '" khỏi cơ sở dữ liệu.');
        $_huyen->delete();
        return redirect(route('huyen.index'));
    }
    public function import(Request $request)
    {       
        $extension = File::extension($request->file->getClientOriginalName());
        if ($extension == "xlsx" || $extension == "xls" ) {
            Huyen::truncate();
            $path = $request->file->getRealPath();
            (new FastExcel)->sheet(3)->import($path, function ($line) {
                $tinh_id = $line['Mã tỉnh'];
                $code = $line['Mã huyện'];
                $name = $line['Huyện'];
                Huyen::create([
                    'code' => $code,
                    'tinh_id' => $tinh_id,
                    'name' => $name,
                    'status' => 1,
                ]);
            });
            Session::flash('success-huyen', 'File import vào cơ sở dữ liệu thành công.');  
        }else{
            Session::flash('error-huyen', 'File import không phải là file excel.');  
        }
        return redirect(route('huyen.index'));
    }
}
