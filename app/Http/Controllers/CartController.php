<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\Cart\CreateCartRequest;
use App\Models\Address;
use App\Models\Cart;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
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
