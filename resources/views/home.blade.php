@extends('master')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
            <h2 class="list-product-title">Shop</h2>
                <div class="subtitle">
                    <p>Having {{count($total_products)}} products</p>
                </div>
        </div>
    </div>
    <div class="group-products">
        <div class="row">
            <div class="col-md-3"></div>
            @foreach($all_products as $product)
                <div class="col-md-3">
                    <div class="card" style="width:280px">
                        <a href="{{url('product_detail/'.$product->id)}}"><img src="{{asset('Images/'.$product->product_image)}}" width="280px" height="280px"></a>
                        <div class="card-body">
                            <p class="card-text justify-text-card">{{$product->product_name}}</p>
                            <p style="font-size:12px">{{$product->author_name}}</p>
                            <p class="card-title text-primary justify-text-card"><b>{{number_format($product->product_price)}} đ </b></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row text-center">{{$all_products->links()}}</div>
    </div>
</div>
@endsection