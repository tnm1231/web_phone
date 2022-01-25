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
use App\Models\Address;
use App\Models\district;
use App\Models\province;
use App\Models\street;
use App\Models\ward;
use App\Models\wishlist;

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
        $wishlist = null;
        if($user){
        $cart = Cart::where('type', 0)->where('user_id', $user->id)->get();
        $wishlist = wishlist::where('user_id', $user->id)->get();
        }



        $listCategory = product::join('categories', 'category_id','categories.id')
                                ->select('products.category_id','products.brand_id', 'categories.name as nameCate')
                                ->get();


        return view('client.index', compact('newArrival','bestSeller','comingsoon','outofstock','listCategory','mainBanner','subBanner','product','cart','wishlist'));
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
        $wishlist = null;
        if($user){
        $cart = Cart::where('type', 0)->where('user_id', $user->id)->get();
        $wishlist = wishlist::where('user_id', $user->id)->get();
        }

        if($data){
            $product = product::where('category_id', $data->id)->get();
            return view('client.shopCate', compact('product', 'data','cart','wishlist'));
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
        $wishlist = null;
        if($user){
        $cart = Cart::where('type', 0)->where('user_id', $user->id)->get();
        $wishlist = wishlist::where('user_id', $user->id)->get();
        }

        if($data){
            $product = product::where('brand_id', $data->id)->get();
            return view('client.shopBrand', compact('product', 'data','banner','cart','wishlist'));
        } else {
            toastr()->error("Product is not exits");
            return redirect('/');
        }
    }
    public function viewCart()
    {
        $user = Auth::user();
        $cart = null;
        $wishlist = null;
        if($user){
        $cart = Cart::where('type', 0)->where('user_id', $user->id)->get();
        $wishlist = wishlist::where('user_id', $user->id)->get();
        }

        return view('client.cart', compact('cart','wishlist'));
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
    public function editQty(Request $request)
    {
        $user = Auth::user();

        $data = Cart::where('type', 0)->where('user_id', $user->id)->where('id', $request->id)->first();

        if($data) {
            $data->qty = $request->qty;
            $data->save();
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }


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
        $user = Auth::user();
        $address = Address::where('user_id',$user->id)->get();

        $cart = null;
        $wishlist = null;
        if($user){
        $cart = Cart::where('type', 0)->where('user_id', $user->id)->get();
        $wishlist = wishlist::where('user_id', $user->id)->get();
        }
        $district = district::all();
        $province = province::all();
        $street = street::all();
        $ward = ward::all();
        return view('client.checkout', compact('cart','address','wishlist','district','province','street','ward'));
    }

    public function viewWish()
    {
        $user = Auth::user();
        $cart = null;
        $wishlist = null;
        if($user){
        $cart = Cart::where('type', 0)->where('user_id', $user->id)->get();
        $wishlist = wishlist::where('user_id', $user->id)->get();
        }

        return view('client.wishlist',compact('wishlist','cart'));
    }
    public function wishList(Request $request)
    {
        $user_id = Auth::user()->id;
        $data = wishlist::where('product_id', $request->product_id)->where('user_id', $user_id)->first();
        if($data) {
            toastr()->error("Product has been already added!!!");
        }else {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            wishlist::create($data);
        }

       return response()->json(['data' => $data]);
    }
    public function destroyWish($id)
    {
        $user = Auth::user();
        // $data = Cart::where('id', $id)->where('user_id', $user->id)->where('type', 0)->first();
        $data = wishlist::where('id', $id)->where('user_id', $user->id)->get();
        if($data){
            foreach($data as $key => $value){
                $value->delete();
            }
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }

}


