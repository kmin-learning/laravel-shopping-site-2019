@extends('master')
<title>@yield('title', 'Check Out')</title>
@section('content')
@section('breadcrumb')
<ul class="breadcrumb">
	<li><a href="{{ url('/') }}">Home</a> <span class="divider"></span></li>
	<li><a href="{{ url('/Cart_detail') }}">Cart</a><span class="divider"></span></li>
	<li class="active">Check Out</li>
</ul>
@endsection

<h3> Address </h3>
<hr class="soft" />
<div class="well">
	<form class="form-horizontal" method="post" name="form_check_out" action="{{ route('save_order')}}">
		{{ csrf_field() }}
		<h4>Personal Information</h4>
		<div class="form-group">
			<label class="control-label col-sm-3" for="email">Email:</label>
			<div class="col-sm-9">
				<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="phone">Phone:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone numbers">
			</div>
		</div>

		<h4>Billing Address</h4>
		<div class="form-group">
			<label class="control-label col-sm-3" for="name">Name:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-3" for="address">Address:</label>
			<div class="col-sm-9">
				<input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-9">
				<button type="submit" name="btn_finish" class="btn btn-default">Finish</button>
			</div>
		</div>
	</form>
</div>
@endsection