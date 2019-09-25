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
    public function update(Request $request)
    {
        $rowId = $request->get('product_row_id');
        $quantity = $request->get('product_quantity');
        $decrease_button = $request->get('decrease');
        $increase_button = $request->get('increase');
        $remove = $request->get('remove_product');
        //dd($remove);

        if ( $decrease_button != '')
        {
            $new_quantity = $quantity - 1;
            if ( $new_quantity <= 0)
            {
                Cart::remove($rowId);
                return Redirect::to("Cart_detail");
            }
            else {
                Cart::update($rowId, $new_quantity);
                return Redirect::to("Cart_detail");
            }
        }
        elseif ($increase_button != '')
        {
            $new_quantity = $quantity + 1;
            Cart::update($rowId, $new_quantity);
            return Redirect::to("Cart_detail");
        }
        elseif ($remove != '')
        {
            Cart::remove($rowId);
            return Redirect::to('Cart_detail');
        }
        elseif ($quantity !='' && $decrease_button =='' && $increase_button =='' && $remove =='')
        {
            $pattern = '/^[0-9]*$/';
            if( preg_match($pattern, $quantity))
            {
                Cart::update($rowId, $quantity);
                return Redirect::to("Cart_detail");
            }
            else {
                Cart::remove($rowId);
                return Redirect::to("Cart_detail");
            }
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
