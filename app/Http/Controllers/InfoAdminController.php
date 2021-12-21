<?php

namespace App\Http\Controllers;

use App\Models\InfoAdmin;
use Illuminate\Http\Request;

class InfoAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.page.admin.profile');
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
     * @param  \App\Models\InfoAdmin  $infoAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(InfoAdmin $infoAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InfoAdmin  $infoAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(InfoAdmin $infoAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InfoAdmin  $infoAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfoAdmin $infoAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InfoAdmin  $infoAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfoAdmin $infoAdmin)
    {
        //
    }
}
