<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\MainBanner;
use App\Models\SubBanner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(){

        $bestSeller = product::where('feature', 0)->get();
        $newArrival = product::where('feature',1)->get();
        $comingsoon = product::where('status',2)->get();
        $outofstock = product::where('status',1)->get();



        $mainBanner = MainBanner::where('is_view',1)->get();
        $subBanner = SubBanner::all();
        $product= product::where('is_view',1)->get();

        $listCategory = product::join('categories', 'category_id','categories.id')
                                ->select('products.category_id','products.brand_id', 'categories.name as nameCate')
                                ->get();


        return view('client.index', compact('newArrival','bestSeller','comingsoon','outofstock','listCategory','mainBanner','subBanner','product'));
    }
    public function shopCate($slug)
    {
        $i = 0;
        for($i = strlen($slug)-1; $i >= 0; $i--){
            if($slug[$i] == '-'){
                break;
            }
        }
        $id = Str::substr($slug, $i + 1, strlen($slug)- $i);

        $data = category::find($id);

        if($data){
            $product = product::where('category_id', $data->id)->get();
            return view('client.shopCate', compact('product', 'data'));
        } else {
            toastr()->error("Product is not exits");
            return redirect('/');
        }
        // return view('client.shopCategory');
    }
    public function shopBrand($slug)
    {
        $i = 0;
        for($i = strlen($slug)-1; $i >= 0; $i--){
            if($slug[$i] == '-'){
                break;
            }
        }
        $id = Str::substr($slug, $i + 1, strlen($slug)- $i);

        $data = Brand::find($id);
        $banner = Brand::all();
        if($data){
            $product = product::where('brand_id', $data->id)->get();
            return view('client.shopBrand', compact('product', 'data','banner'));
        } else {
            toastr()->error("Product is not exits");
            return redirect('/');
        }
    }
    public function cart()
    {

       return view('client.cart');
    }
    public function error(){
        return view('client.404');
    }
    public function profile(){
        return view('client.profile');
    }
    public function detail($slug)
    {
        $i = 0;
        for($i = strlen($slug)-1; $i >= 0; $i--){
            if($slug[$i] == '-'){
                break;
            }
        }
        $id = Str::substr($slug, $i + 1, strlen($slug)- $i);

        $data = Product::find($id);
        $products = Product::all();
        if($data){
            $product = product::where('id', $data->id)->get();
            return view('client.detail', compact('product', 'data','products'));
        } else {
            toastr()->error("Product is not exits");
            return redirect('/');
        }
    }
    public function cate(){
        return view('client.cate');
    }
    public function checkout(){
        return view('client.checkout');
    }
}
