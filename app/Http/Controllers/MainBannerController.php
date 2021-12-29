<?php

namespace App\Http\Controllers;

use App\Models\MainBanner;
use Illuminate\Http\Request;
use App\Models\SubBanner;

class MainBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listMain = MainBanner::all();
        $listSub = SubBanner::all();

        return view('admin.page.banner.listBanner', compact('listMain','listSub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMain(Request $request)
    {

        $data = $request->all();
        MainBanner::create($data);

        return response()->json(['status' => true]);
    }
    public function storeSub(Request $request)
    {

        $data = $request->all();
        SubBanner::create($data);

        return response()->json(['status' => true]);
    }

    public function updateIsview(Request $request)
    {
        $id = $request->id;
        $banner = MainBanner::find($id);
        if($banner){
            $banner->is_view = ($banner->is_view + 1) % 2;
            $banner->save();
            return response()->json(['status' => true, 'is_view' => $banner->is_view]);
        } else {
            // Tìm không thấy
            return response()->json(['status' => false]);
        }

    }
    public function show(MainBanner $mainBanner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainBanner  $mainBanner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = MainBanner::find($id);

        if($banner){
            return response()->json(["data" => $banner]);
        }else {
            toastr()->error("Banner does not exists");
            return $this->index();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainBanner  $mainBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MainBanner $mainBanner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainBanner  $mainBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = MainBanner::find($id);
        if($banner){
            $banner->delete();
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }
}
