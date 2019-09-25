<!DOCTYPE html>
<html>

<head>
    <title> @yield('title', 'Online Shopping')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/memenu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
<div class ="header">
    @section('header')
    <div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
			        <div class="navbar-header">
				    <a href={{ route('product_homepage') }} class="navbar-brand">OnlineShopping</a>
                    </div>
                </div>
                <div class="col-md-5 dropdown">
			        <form method="get" action={{url('command_search_keyword_product')}} autocomplete="off">
                    {{ csrf_field() }}
				        <ul class="nav navbar-nav">
                            <li class="form-group" style="width:450px;left:10px;top:10px;">
                                <input type="text" class="form-control" id="search" name="search_keyword">
                                <div id="suggestion_box"></div>
					        </li>
					        <li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn" name=""><span
                                class='glyphicon glyphicon-search'></span></button>
                            </li>
				        </ul>
                    </form>
                </div>
                <div class="col-md-5">
			        <ul class="nav navbar-nav navbar-right">
			        <!-- class="dropdown-toggle" data-toggle="dropdown" -->
				        <li id='shoppingcart'><a href={{ route('Cart_detail') }}  >
                            <span class="glyphicon glyphicon-shopping-cart"></span>Cart <span class="badge"> @include('cart.quantities')</span> </a>
				        </li>

				<?php
				if(Auth::check()){
                ?>
					<li><a href="{{ route('order_list') }}" class="dropdowm-toggle" data-toggle="dropdown"><span
					class="glyphicon glyphicon-user"></span>{{Auth::user()->name}}</a></li>

                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                <?php
				}
				else	
				{
					?>
					    <li><a href="{{url('login')}}" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span>Login</a>
				    <?php
				        }
				    ?>
                    </ul>
                </div>
            </div>
		</div>
	</div>
    <br><br><br>
    @show
</div>

<div class="navigation">
    @section('navigation')
    <div class="header-bottom">
		<div class="container">
			<div class="top-nav">
				<ul class="memenu skyblue">
                    <li class="active"><a href="index.php">Home</a></li>
                    
					<li class="grid"><a href="#">Products</a></li>
                    
					<li class="grid"><a href="#">Services</a> </li>
                    
					<li class="grid"><a href="#">About Us</a></li>
				</ul>
			</div>
		</div>
	</div>
    @show
</div>

<div class="breamcrumb">
    @section('breadcrumb')
        
    @show
</div>

<div class="content">
    @section('content')
    <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <h2 class="list-product-title">Shop</h2>
                        <div class="subtitle">
                            <p>Products</p>
                        </div>
                </div>
            </div>
            <div class="group-products">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <div class="card" style="width:280px">
                            <img src="http://via.placeholder.com/280x280">
                            <div class="card-body">
                                <p class="card-title text-primary justify-text-card">Price</p>
                                <p class="card-text justify-text-card">Name of Product</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="width:280px">
                            <img src="http://via.placeholder.com/280x280">
                            <div class="card-body">
                                <p class="card-title text-primary justify-text-card">Price</p>
                                <p class="card-text justify-text-card">Name of product</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="card" style="width:280px">
                            <img src="http://via.placeholder.com/280x280">
                            <div class="card-body">
                                <p class="card-title text-primary justify-text-card">Price</p>
                                <p class="card-text justify-text-card">Name of product</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row2-->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        <div class="card mt-4" style="width:280px">
                            <img src="http://via.placeholder.com/280x280">
                            <div class="card-body">
                                <p class="card-title text-primary justify-text-card">Price</p>
                                <p class="card-text justify-text-card">Name of Product</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mt-4" style="width:280px">
                            <img src="http://via.placeholder.com/280x280">
                            <div class="card-body">
                                <p class="card-title text-primary justify-text-card">Price</p>
                                <p class="card-text justify-text-card">Name of product</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mt-4" style="width:280px">
                            <img src="http://via.placeholder.com/280x280">
                            <div class="card-body">
                                <p class="card-title text-primary justify-text-card">Price</p>
                                <p class="card-text justify-text-card">Name of product</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @show
</div>
<div class="footer">
    @section('footer')
        <div class="container">
            <div class="footer-top">
                <div class="col-md-3 footer-left">
                    <h3>ABOUT US</h3>
                    <ul>
                        <li><a href="#">Who We Are</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Our Sites</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Carrers</a></li>					 
                    </ul>
                </div>
                <div class="col-md-3 footer-left">
                    <h3>YOUR ACCOUNT</h3>
                    <ul>
                        <li><a href="#">Your Account</a></li>
                        <li><a href="#">Personal Information</a></li>
                        <li><a href="#">Addresses</a></li>
                        <li><a href="#">Managing Order</a></li>				 					 
                    </ul>
                </div>
                <div class="col-md-3 footer-left">
                    <h3>CUSTOMER SERVICES</h3>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Cancellation</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Buying Guides</a></li>					 
                    </ul>
                </div>
                <div class="col-md-3 footer-left">
                    <h3>CATEGORIES</h3>
                    <ul>
                        <li><a href="#">Comics</a></li>
                        <li><a href="#">Adventures</a></li>
                        <li><a href="#">Science fictions</a></li>
                        <li><a href="#">Horror</a></li>
                        <li><a href="#">Romance</a></li>				 
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="footer-text">
            <div class="container">
                    <div class="footer-main">
                        <p class="footer-class">Copyright © <a href="#">Online Shopping</a> 2019, All rights reserved. </p> 
                    </div>
            </div>
        </div>
    @show
</div>
<script type="text/javascript" src="{{URL::asset('js/autofill.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('js/input_cart_detail.js')}}"></script>
</body>
