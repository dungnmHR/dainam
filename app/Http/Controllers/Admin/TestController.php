<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getIndex(\Datatables $datatables)
    {
        $columns = ['id', 'name', 'email', 'created_at', 'updated_at'];

        if ($datatables->getRequest()->ajax()) {
            return $datatables->of(User::select($columns))->make(true);
        }

        $html = $datatables->getHtmlBuilder()->columns($columns);

        return view('admin.test.datatable', compact('html'));
    }

    public function anyData()
    {
        return \Datatables::of(User::query())->make(true);
    }

    public function updateCol(\Datatables $datatables)
    {
        $columns = ['id', 'name', 'email'];

        if ($datatables->getRequest()->ajax()) {
            return $datatables->of(User::select($columns))->make(true);
        }

        $html = $datatables->getHtmlBuilder()->columns($columns);

        return view('admin.test.partial', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}
