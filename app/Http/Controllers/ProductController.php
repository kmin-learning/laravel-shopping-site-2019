<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_products = Product::get();
        $all_products = Product::paginate(3);
        return view('home',compact('all_products','total_products'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product_detail = Product::find($id);
        return view('product_detail',compact('product_detail'));
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
        //
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
    }

    public function fetch(Request $request)
    {
        if ($request->input('data_search')){
            $query = $request->input('data_search');
            $data = Product::where('product_name','LIKE','%'.$query.'%')->get();
            //$data_author_name = Product::where('author_name','LIKE','%'.$query.'%')->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:absolute">';
            foreach ($data as $row)
            {
                $output .= '<li onClick="'."hide_suggestion_box('".$row->product_name."')".'">'.'<a href="#">'.$row->product_name.'</a></li>';
            }
            $output .= '</ul>';
            return $output;
        }
    }

    public function search_keyword(Request $request)
    {
        if ($request->input('search_keyword'))
        {
            $keyword = $request->input('search_keyword');
            $data = Product::where('product_name','LIKE','%'.$keyword.'%')
                           ->orwhere('author_name','LIKE','%'.$keyword.'%')
                           ->paginate(2);
            //dd($data);
            $data->appends($request->only('Product'));
            return view('search_product',compact('data'));
        }
    }
}
