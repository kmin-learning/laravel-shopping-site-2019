@extends('master')
	<title>@yield('title', 'Cart')</title> 
	@section('content')
		@section('breadcrumb')
		<ul class="breadcrumb">
			<li><a href=" {{ url('/') }} ">Home</a> <span class="divider"></span></li>
			<li class="active">Cart </li>
		</ul>
		@endsection
		<div class="well well-small">
			<h1>Cart </h1>
			<p class="pull-right"> {{count($cart)}} items are in the cart </p>
			<hr class="soften"/>	

			<table class="table table-bordered table-condensed">
				<thead>
					<tr>
					<th>Image</th>
					<th colspan="3">Name</th>
					<th>Unit price</th>
					<th>Quantity </th>
					<th>Total</th>
					<th></th>
					</tr>
				</thead>
				<tbody>
						@foreach($cart as $item)
						<tr>
							<td><img src="Images/{{ $item->options->image }} " width="100" ></td>
							<td colspan="3"> {{ $item->name }} </td>
							<td> {{ number_format($item->price) }} </td>
							<td>
								<div class="cart_quantity_input">
									<form action='{{url("update_quantity/$item->id&increment=1")}}' method="post">
										<input type="hidden" name="product_id" value="{{ $item->id }}">
										<button type="button" id="decrease" style="width:30px">+</button>
									</form>
									<input class="cart_quantity_input" type="tel" id="quantity" value="{{$item->qty}}" style="width:30px">
									<form action='{{url("update_quantity/$item->id&decrease=1")}}'>
										<button type="button" id="increase" style="width:30px">-</button>
									</form>
								</div>
							</td>
							<td class="cart_total_price"> {{ number_format($item->subtotal) }} </td>
							<td class="cart_delete">
                            <a type="button" class="btn btn-danger btn-sm cart_quantity_delete " href="{{url("remove_cart_product/$item->id")}}"><i class="fa fa-times"></i>Remove</a>
						</tr>
						@endforeach
				</tbody>
				<thead>
					<tr>
						<th colspan="8"> Total: {{ Cart::Total() }} </th>
						
					</tr>
				</thead>
			</table><br/>
		
			<a href=" {{ url('/') }} " class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
			<a href="{{ url('/check_out') }}" class="shopBtn btn-large pull-right">Check out <span class="glyphicon glyphicon-arrow-right"></span></a>

		</div>
	</div>
	</div>
	
	@endsection
	