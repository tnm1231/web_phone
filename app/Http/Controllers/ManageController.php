<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Manage\addTask;
use App\Models\manage;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.page.todolist.manage');
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
    public function store(addTask $request)
    {
        $data = $request->all();
        dd($data);
        manage::create($data);

        return response()->json(['status' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function show(manage $manage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function edit(manage $manage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, manage $manage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function destroy(manage $manage)
    {
        //
    }
}
