<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Product\createRequest;
use App\Http\Requests\Admin\Product\updateRequest;
use App\Models\category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::join('categories', 'category_id', 'categories.id')
                        ->select('products.*', 'categories.name as nameCate')
                        ->get();
        $category = category::where('is_view', 1)->get();
        return view('admin.page.product.listProduct',compact('product','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::where('is_view', 1)->get();
        return view('admin.page.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createRequest $request)
    {
        $data = $request->all();
        product::create($data);

        return response()->json(['status' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);
        if($product){
            return response()->json(["data" => $product]);
        }else {
            toastr()->error("Product does not exits");
            return $this->index();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request)
    {
        $data = $request->all();
        $product = product::find($request->id);
        $product->update($data);
        return response()->json(['status' => true]);
    }

    public function changeValueView(Request $request){
        $id = $request->id;
        $product = product::find($id);
        if($product){
            $product->is_view = ($product->is_view + 1) % 2;
            $product->save();
            return response()->json(['status' => true, 'is_view' => $product->is_view]);
        } else {
            // Tìm không thấy
            return response()->json(['status' => false]);
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);
        if($product){
            $product->delete();
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }
}
