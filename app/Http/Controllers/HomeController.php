<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\MainBanner;
use App\Models\SubBanner;
use Illuminate\Support\Facades\DB;

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
    public function shopCate($id)
    {
        $data = category::find($id);
        if($data){
            $product = product::where('category_id', $data->id)->get();
            return view('client.index', compact('product', 'data'));
        } else {
            toastr()->error("Product is not exits");
            return redirect('/');
        }
        return view('client.shopCate');
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
    public function detail(){
        return view('client.detail');
    }
    public function cate(){
        return view('client.cate');
    }
    public function checkout(){
        return view('client.checkout');
    }
}
