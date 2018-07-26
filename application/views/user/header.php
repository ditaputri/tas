<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>YStrike Shop</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets_home/') ?>css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets_home/') ?>css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets_home/') ?>css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets_home/') ?>css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="<?php echo base_url('assets_home/') ?>css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets_home/') ?>css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					
					<ul class="header-links pull-right">
						<?php if ($this->session->userdata('logged_in') != null): ?>
							<li><a href="<?php echo base_url('index.php/login/logout') ?>"><i class="fa fa-user-o"></i> Logout</a></li>
						<?php else: ?>	
							<li><a href="<?php echo base_url('index.php/login') ?>"><i class="fa fa-user-o"></i> Login</a></li>
						<?php endif ?>
					</ul>
				</div>
			</div>
<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="<?php echo base_url('assets_home/')?>img/img4.png" alt="" style="max-height:70px;min-height:70px;">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form method="post">
									</select>
									<input class="input" placeholder="Search here" type="text" name="search">
									<button type="submit" class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty"><?php echo count($this->cart->contents()); ?></div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											<?php foreach ($this->cart->contents() as $key => $value): ?>
												<div class="product-widget">
												<div class="product-img">
													<img src="<?php echo base_url('assets/uploads/'.$value['foto']) ?>" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#"><?php echo $value['name'] ?></a></h3>
													<h4 class="product-price"><span class="qty"><?php echo $value['qty'] ?>x</span>Rp <?php echo $this->cart->format_number($value['price']) ?></h4>
												</div>
												<a class="delete" href="<?php echo base_url("index.php/Cart/remove/".$value['rowid']) ?>"><i class="fa fa-close"></i></a>
											</div>
											<?php endforeach ?>
										</div>
										<div class="cart-summary">
											<small><?php echo count($this->cart->contents()); ?> Item(s) selected</small>
											<h5>SUBTOTAL: <?php echo $this->cart->format_number($this->cart->total()) ?></h5>
										</div>
										<div class="cart-btns">
											<a href="">Continue</a>
											<a href="<?php echo base_url('index.php/Cart/checkout') ?>">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class=""><a href="<?php echo site_url('Home'); ?>">Home</a></li>
						<?php foreach ($this->db->get('kategori')->result() as $key => $value): ?>
							<li><a href="<?php echo site_url('Home/kategori/'.$value->nama_kategori) ?>"><?php echo $value->nama_kategori ?></a></li>
						<?php endforeach ?>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->