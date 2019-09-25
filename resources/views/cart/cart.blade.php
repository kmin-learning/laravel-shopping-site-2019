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
									<form action='{{ route('update_quantity') }}' method="post" id="form_cart">
										{{ csrf_field() }}
										<input type="hidden" name="product_row_id" value="{{ $item->rowId }}">
										<button type="submit" id="cart_decrease" style="width:30px" name="decrease" value="decrease">-</button>
										<input class="cart_quantity_input" type="tel" id="input_quantity" name="product_quantity" value="{{$item->qty}}" style="width:30px">
										<button type="submit" id="cart_increase" name="increase" value="increase" style="width:30px">+</button>
										<button type="submit" id="remove" class="btn btn-danger btn-sm cart_quantity_delete" name="remove_product" value="remove_product"><i class="fa fa-times"></i>Remove</button>
									</form>
								</div>
							</td>
							<td class="cart_total_price"> {{ number_format($item->subtotal) }} </td>
						</tr>
						@endforeach
				</tbody>
				<thead>
					<tr>
						<th colspan="8"> Total: {{ Cart::subtotal() }} </th>
						
					</tr>
				</thead>
			</table><br/>
		
			<a href=" {{ url('/') }} " class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
			<a href="{{ url('/check_out') }}" class="shopBtn btn-large pull-right">Check out <span class="glyphicon glyphicon-arrow-right"></span></a>

		</div>
	</div>
	</div>
	
	@endsection
	