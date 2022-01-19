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
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

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


        $user = Auth::user();
        $cart = null;
        if($user){
        $cart = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }

        $listCategory = product::join('categories', 'category_id','categories.id')
                                ->select('products.category_id','products.brand_id', 'categories.name as nameCate')
                                ->get();


        return view('client.index', compact('newArrival','bestSeller','comingsoon','outofstock','listCategory','mainBanner','subBanner','product','cart'));
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


        $user = Auth::user();
        $cart = null;
        if($user){
        $cart = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }

        if($data){
            $product = product::where('category_id', $data->id)->get();
            return view('client.shopCate', compact('product', 'data','cart'));
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


        $user = Auth::user();
        $cart = null;
        if($user){
        $cart = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }

        if($data){
            $product = product::where('brand_id', $data->id)->get();
            return view('client.shopBrand', compact('product', 'data','banner','cart'));
        } else {
            toastr()->error("Product is not exits");
            return redirect('/');
        }
    }
    public function viewCart()
    {
        $user = Auth::user();
        $cart = null;
        if($user){
        $cart = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }

        return view('client.cart', compact('cart'));
    }
    public function cart()
    {
        $user = Auth::user();

        $data = Cart::join('products', 'products.id','carts.product_id')
                    ->select('carts.*','products.image_product','products.name','products.price_root','products.price_sell','products.slug')
                    ->where('carts.user_id', $user->id)
                    ->where('products.status',0)
                    ->get();
       return response()->json(['data' => $data]);
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

        $user = Auth::user();
        $cart = null;
        if($user){
        $cart = Cart::where('type', 0)->where('user_id', $user->id)->get();
        }

        $data = Product::find($id);
        $products = Product::all();
        if($data){
            $product = product::where('id', $data->id)->get();
            return view('client.detail', compact('product', 'data','products','cart'));
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
