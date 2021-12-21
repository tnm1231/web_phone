<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\categoryRequest;
use App\Http\Requests\Admin\Category\updateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function viewAdmin(){
    //     $admin = Auth::user();
    //     dd($admin);
    //     return view('admin.share.master', compact('admin'));
    // }
    public function index()
    {
        $listCategory = DB::table('categories as A')
                        ->leftJoin('categories as B', 'A.parent_id', 'B.id')
                        ->select('A.*', 'B.name as nameParent')
                        ->get();
        $category = category::where('parent_id', 0)->get();

        return view('admin.page.categories.listCategory', compact('listCategory','category'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::where('parent_id', 0)->get();
        return view('admin.page.categories.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(categoryRequest $request)
    {
        $data = $request->all();
        category::create($data);

        return response()->json(['status' => true]);
    }


    public function updateIsview($id)
    {
        $category = category::find($id);

        if($category){
            $category->is_view = ($category->is_view + 1) % 2;
            $category->save();

            return response()->json(true);
        }

        return response()->json(false);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = category::find($id);

        if($category){
            return response()->json(["data" => $category]);
        }else {
            toastr()->error("Category does not exits");
            return $this->index();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request)
    {
        $data = $request->all();
        $category = category::find($request->id);
        $category->update($data);
        return response()->json(['status' => true]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy_only($id)
    {
        $category = category::find($id);
        if($category){
            $category->delete();
            $listCate = category::where('parent_id', $id)->get();
            foreach ($listCate as $key => $value) {
                $value->parent_id=0;
                $value->save();
            }
        return response()->json(true);

        }
        return response()->json(false);
    }
    public function destroy_all($id)
    {
        $category = category::find($id);
        if($category) {
            $category->delete();
            $listCate = category::where('parent_id', $id)->get();
            foreach ($listCate as $key => $value){
                $value->delete();
            }
            return response()->json(true);
        }
        return response()->json(false);
    }
}
