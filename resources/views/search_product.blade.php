@extends('master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
            <h2 class="list-product-title">Shop</h2>
                <div class="subtitle">
                    <p>Found {{$data->total()}} products</p>
                </div>
        </div>
    </div>
    <div class="group-products">
        <div class="row">
            <div class="col-md-3"></div>
            @foreach($data as $row)
                <div class="col-md-3">
                    <div class="card" style="width:280px">
                        <a href="{{url('product_detail/'.$row->id)}}"><img src="{{asset('Images/'.$row->product_image)}}" width="280px" height="280px"></a>
                        <div class="card-body">
                            <p class="card-text justify-text-card">{{$row->product_name}}</p>
                            <p style="font-size:12px">{{$row->author_name}}</p>
                            <p class="card-title text-primary justify-text-card"><b>{{number_format($row->product_price)}} đ </b></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row text-center">{{$data->appends(request()->input())->links()}}</div>
    </div>
</div>
@endsection()