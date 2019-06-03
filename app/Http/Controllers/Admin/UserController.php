<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest as UserRequest;
use App\User;
use Session;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $_users = User::all();
        return view('admin.users.list', ['users' => $_users ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $_tmp = $request->all();
        $_tmp['password'] =  bcrypt($_tmp['password']);
        User::create($_tmp);
        Session::flash('success-user', 'Tạo mới quản trị viên "'.$request->email.'" thành công.');
        return redirect(route('user.create'));
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
        $_user = User::find($id);
        if (!isset($_user)){
            Session::flash('error-user', 'Không tìm thấy quản trị viên thành cần sửa.');
            return redirect(route('user.index'));
        }

        return view('admin.users.edit', ['user' => $_user]);
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
        $_user = User::find($id);
        if (!isset($_user)){
            Session::flash('error-user', 'Không tìm thấy quản trị viên thành cần sửa.');
            return redirect(route('user.index'));
        }
        $_tmp = $request->all();
        if(isset($_tmp['password_new']) && $_tmp['password_new'] != "") $_tmp['password'] = bcrypt($_tmp['password_new']);
        $_user->update($_tmp);
        Session::flash('success-user', 'Thay đổi thông tin thành công.');
        return redirect(route('user.edit', ['id' => $id]));
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
        $_user = User::find($id);
        if (!isset($_user)){
            Session::flash('error-user', 'Không tìm thấy quản trị viên thành cần sửa.');
            return redirect(route('user.index'));
        }
        Session::flash('success-user', 'Đã xóa quản trị viên "'.$_user->name. '" khỏi cơ sở dữ liệu.');
        $_user->delete();
        return redirect(route('user.index'));
    }
}
