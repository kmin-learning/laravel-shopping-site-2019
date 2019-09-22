<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Product;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = Cart::content();
        $this->data['cart'] = $content;
        return view('cart.cart', $this->data);
    }

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
    public function store(Request $request)
    {
        $quantity = $request->input('quantity_product');
        $id_product = $request->input('id_product');
        $product_info = Product::find($id_product);
        $product_name = $product_info->product_name;
        $product_price = $product_info->product_price;
        $product_image = $product_info->product_image;
        Cart::add([['id' => $id_product, 'name' => $product_name, 'qty' => $quantity, 'price' => $product_price, 'options' => array('image' => $product_image),]]);
        return Redirect::to("Cart_detail");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $rowId = Cart::search(array('id' => $request->input('product_id')));
            $item = $id->input($rowId[0]);
    
            Cart::update($rowId[0], $item->qty - 1);
        }
        
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $rowId = Cart::search(array('id' => $request->input('product_id')));
            $item = $id->input($rowId[0]);
    
            Cart::update($rowId[0], $item->qty + 1);
        }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        $rowId = Cart::search(array('id' => $id->input('product_id')));
        Cart::remove($rowId[0]);
       
    }
}
