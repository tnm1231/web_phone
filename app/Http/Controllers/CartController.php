<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Cart\CreateCartRequest;
use App\Models\Address;
use App\Models\Bill;
use App\Models\Cart;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
    public function store(CreateCartRequest $request)
    {
        $user_id = Auth::user()->id;
        $data = Cart::where('product_id', $request->product_id)->where('user_id', $user_id)->where('type', 0)->first();
        if($data) {
            $data->qty += $request->qty;
            $data->save();
        }else {
            $data = $request->all();
            $data['user_id'] = Auth::user()->id;
            $data['type']  = 0;
            Cart::create($data);

        }


       return response()->json(['data' => $data]);
    }
     public function address(Request $request)
     {
        $user_id = Auth::user()->id;
        $data = Cart::where('user_id', $user_id)->first();
        $data = $request->all();
        // foreach ($data as $key => $value) {
        //     Brand::create($data);        }
        Address::create($data);

        return response()->json(['status' => true]);

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function processCheck(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        if($user){
        $data = Bill::create([
            'address_id' => $request->address_id,
            'hash'      =>      Str::uuid(),
            'status'    =>      \App\Models\Bill::STATUS_VUA_DAT_HANG,
            'user_id'   =>      $user->id,
        ]);
            $total = 0;

            $bill = Cart::join('products', 'products.id', 'carts.product_id')
                            ->select('carts.*', 'products.image_product','products.price_root','products.price_sell','products.name')
                            ->where('carts.user_id', $user->id)
                            ->where('products.status', 0)
                            ->where('carts.type', 0)
                            ->get();
            foreach($bill as $key => $value){
                if(!$value->price_sell){
                    $price = $value->pricce_root;
                } else {
                    $price = $value->price_sell;
                }

                $total += $value->qty * $price;
                $value->address = $data->address_id;
                $value->bill_id = $data->id;
                $value->type = 1;

                $value->save();
            }
            $data->total = $total;
            $data->save();
            return response()->json(['data' => true]);
            }



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function viewStorage()
    {
        // $bill = Cart::join('products', 'products.id', 'carts.product_id')
        // ->select('carts.*', 'products.image_product','products.price_root','products.price_sell','products.name')
        // ->where('carts.user_id', $user->id)
        // ->where('products.status', 0)
        // ->where('carts.type', 0)
        // ->get();
        // $address = Address::all();
        $data = Cart::join('addresses','addresses.id','carts.address')
                    ->leftJoin('district','district.id', 'addresses.district')
                    ->leftJoin('province','province.id','addresses.province')
                    ->leftJoin('ward','ward.id','addresses.ward')
                    ->select('addresses.*','carts.product_id','carts.bill_id','carts.address','carts.qty','carts.type','district._name','province._name as provinceName','ward._name as wardName')
                    ->where('carts.type',1)
                    // ->where('carts.address','addresses.id')
                    ->get();

        return view('admin.page.storage.index',compact('data'));
    }
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        // $data = Cart::where('id', $id)->where('user_id', $user->id)->where('type', 0)->first();
        $data = Cart::where('id', $id)->where('user_id', $user->id)->where('type', 0)->get();
        if($data){
            foreach($data as $key => $value){
                $value->delete();
            }
            return response()->json(['status' => true]);
        }
        return response()->json(['status' => false]);
    }

}
