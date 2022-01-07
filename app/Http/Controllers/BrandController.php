<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Http\Requests\Admin\Brand\updateRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::all();
        return view('admin.page.brand.listBrand', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::where('is_view',1)->get();
        return view('admin.page.brand.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        foreach ($en as $key => $value) {
            Brand::create($data);        }
        Brand::create($data);

        return response()->json(['status' => true]);
    }
    public function updateIsview($id)
    {
        $brand = brand::find($id);

        if($brand){
            $brand->is_view = ($brand->is_view + 1) % 2;
            $brand->save();

            return response()->json(true);
        }

        return response()->json(false);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);

        if($brand){
            return response()->json(["data" => $brand]);
        }else {
            toastr()->error("Brand does not exists");
            return $this->index();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request)
    {
        $data = $request->all();
        $brand = Brand::find($request->id);
        $brand->update($data);
        return response()->json(['status' => true]);
    }

    public function destroyAll($id)
    {
        $brand = brand::find($id);
        if($brand){
            $brand->delete();
            $listBrand = product::where('brand_id', $id)->get();
            foreach($listBrand as $key => $value){
                $value->delete();
            }
            return response()->json(true);
        }
        return response()->json(false);
    }
    public function destroyOnly($id)
    {
        $brand = Brand::find($id);
        if($brand){
            $brand->delete();
            $listbrand = Brand::where('parent_id', $id)->get();
            foreach ($listbrand as $key => $value) {
                $value->parent_id=0;
                $value->save();
            }
        return response()->json(true);

        }
        return response()->json(false);
    }
}
