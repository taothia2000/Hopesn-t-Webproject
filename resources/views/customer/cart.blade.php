<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart page</title>
    <link href="{{('../public/customer/frontend/css/bootstrap.min.css')}}" rel="stylesheet" >
    <link href="{{('../public/customer/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{('../public/customer/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{('../public/customer/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{('../public/customer/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{('../public/customer/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{('../public/customer/frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{('../public/customer/frontend/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	
<body>
	<header id="header"><!--header-->	
		<div class="header-middle"><!--header-top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4"> 
						<div class="logo pull-left">
							<a href="{{('index')}}"><img src="{{('../public/customer/frontend/images/logo.jpg')}}" alt="" /></a>        <!--Để logo shop-->
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">				
								@if(Session::has('Email'))
								<li><a href="{{ route('home') }}">Welcome, {{ Session::get('Name') }}</a></li>
								@endif								
								@if (Session::has('Email'))	
									<li><a href="{{ route('logOut') }}"><i class="fa fa-lock"></i>Log out</a> </li>
								@else
    								<li><a href="{{ route('login') }}"><i class="fa fa-lock"></i>Log in</a> </li>
								
								@endif
								@csrf
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-top-->

		<div class="header-bottom"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{('index')}}" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Products<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">White chocolate</a></li>
										<li><a href="product-details.html">Dark chocolate</a></li> 
										<li><a href="checkout.html">Cake</a></li> 
										<li><a href="cart.html">Drinks</a></li> 
                                    </ul>
                                </li> 
								<li><a href="404.html">About us</a></li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	</header><!--/header-->



			<section id="cart_items">
				<div class="container">
					<div class="breadcrumbs">
						<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li class="active">Shopping Cart</li>
						</ol>
					</div>
					<div class="table-responsive cart_info">
						<table class="table table-condensed">
							<thead>
								<tr class="cart_menu">
									<td class="image">Item</td>
									<td class="description"></td>
									<td class="price">Price</td>
									<td class="quantity">Quantity</td>
									<td class="total">Subtotal</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
							<?php $total =0 ?>
							@if(session('cart'))
								@foreach(session('cart') as $id => $details)
								 <?php $total += $details['price'] * $details['quantity'] ?>                 
									<tr>
										<td class="cart_product">
											<a href=""><img src="{{$details['img']}}" width ="80" alt=""></a>
										</td>
										<td class="cart_description">
											<h4><a href="">{{ $details['name']}}</a></h4>
										</td>
										<td class="cart_price">
											<p>${{ $details['price']}}</p>
										</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button">
												<a class="cart_quantity_up" href=""> + </a>
												<input class="cart_quantity_input" type="text" name="quantity" value="{{ $details['quantity']}}" autocomplete="off" size="2">
												<a class="cart_quantity_down" href=""> - </a>
											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price">${{ $details['price'] * $details['quantity']}}</p>    
										</td>									
										<td class="cart_delete">
											<a class="cart_quantity_delete" href="{{ url('cart',  $details['id'])}}"> <i class="fa fa-times"></i></a>          
										</td>
									</tr>	
								@endforeach	
							@endif
							</tbody>
						</table>
					</div>
				</div>
			</section> 

			<section id="do_action">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
						</div>
						<div class="col-sm-6">
							<div class="total_area">
								<ul>
									<li>Total 
										<span>
											${{ $total }}	
										</span>
									</li>
								</ul>
								<form action="">
									@csrf
									<button type="submit" class="btn btn-default check_out" href="">Buy now</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section><!--/#do_action-->

			<footer id="footer"><!--Footer-->
				<div class="footer-top">
					<div class="container">
						<div class="row">
							<div class="col-sm-2">
								<div class="companyinfo">
									<h2><span>C</span>-ho World</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="address">
									<img src="{{('frontend/images/map.png')}}" alt="" />
									<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="footer-widget">
					<div class="container">
						<div class="row">
							<div class="col-sm-2">
								<div class="single-widget">
									<h2>Service</h2>
									<ul class="nav nav-pills nav-stacked">
										<li><a href="#">Online Help</a></li>
										<li><a href="#">Contact Us</a></li>
										<li><a href="#">FAQ’s</a></li>
									</ul>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="single-widget">
									<h2>Policies</h2>
									<ul class="nav nav-pills nav-stacked">
										<li><a href="#">Terms of Use</a></li>
										<li><a href="#">Privecy Policy</a></li>
										<li><a href="#">Refund Policy</a></li>
										<li><a href="#">Billing System</a></li>
										<li><a href="#">Ticket System</a></li>
									</ul>
								</div>
							</div>
							<div class="col-sm-2">
								<div class="single-widget">
									<h2>About Shopper</h2>
									<ul class="nav nav-pills nav-stacked">
										<li><a href="#">Company Information</a></li>
										<li><a href="#">Careers</a></li>
										<li><a href="#">Copyright</a></li>
									</ul>
								</div>
							</div>
							<div class="col-sm-3 col-sm-offset-1">
								<div class="single-widget">
									<h2>About Shopper</h2>
									<form action="#" class="searchform">
										<input type="text" placeholder="Your email address" />
										<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
										<p>Get the most recent updates from <br />our site and be updated your self...</p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				

				<div class="header_top">
					<div class="container">
						<div class="row">
							<div class="col-sm-6">
								<div class="contactinfo">
									<ul class="nav nav-pills">
										<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
										<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
									</ul>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="social-icons pull-right">
									<ul class="nav navbar-nav">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
										<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="footer-bottom">
					<div class="container">
						<div class="row">
							<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
							<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
						</div>
					</div>
				</div>
			</footer><!--/Footer-->
	
    <script src="{{('../public/customer/frontend/js/jquery.js')}}"></script>
	<script src="{{('../public/customer/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{('../public/customer/frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{('../public/customer/frontend/js/price-range.js')}}"></script>
    <script src="{{('../public/customer/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{('../public/customer/frontend/js/main.js')}}"></script>
</body>
</html>

