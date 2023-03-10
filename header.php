<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

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
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
						<li><a href="login/account.php"><i class="fa fa-user-o"></i> My Account</a></li>
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
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="result.php" method="get">
									<select class="input-select">	
										<option value="0">All Categories</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option>
									</select>
									<input name="keyword" class="input" placeholder="Search here">
									<button type="submit" class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<?php
                                                require "config.php";
                                                require "models/db.php";
                                                require "models/products.php ";
                                                require "models/protypes.php ";
                                            
                                                $products = new Products();
                                                $protypes = new Protypes();
                                                $getAllProducts =  $products->getAllProducts();
                                                $getAllProtypes = $protypes->getAllProtypes();
												$tong = 0;										
												$dem = 0;
                                           
												foreach ($getAllProducts as $key => $value) {
												$id2 = $value['id'];
												if(isset($_SESSION['cart'][$id2])){
																				
												$dem = $dem + 1;
												}
												}
												if($dem == 0){
													$dem = 0;													
												}
												else {?>
													<div class="qty"><?php echo $dem;?></div>
												<?php
													$dem = 0;
													}
												?>			
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">																								
											<?php 
													foreach ($getAllProducts as $key => $value) {
													$id2 = $value['id'];
													if(isset($_SESSION['cart'][$id2])){
														?>
														<tr>													
															<div class="product-widget">
																<div class="product-img">
																	<img src="./img/<?php echo $value['image']; ?>" alt="">
																</div>
																<div class="product-body">
																	<h3 class="product-name"><a href="product2.php?id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></h3>
																	<h4 class="product-price"><span class="qty"><?php echo $_SESSION['cart'][$id2]; ?>x</span>$<?php echo number_format( $value['price']); ?></h4>
																</div>
																<a href="del3.php?id=<?php echo $id2; ?>"><button class="delete"><i class="fa fa-close"></i></button></a>
															</div>														
												<?php	
												$tong = $tong + $_SESSION['cart'][$id2] *  $value['price'];
												$dem = $dem + 1;
													}
													}
												?>	
										</div>
										<div class="cart-summary">
											<small><?php echo $dem;?> Item(s) selected</small>
											<h5>SUBTOTAL: <?php echo number_format( $tong);?> VND</h5>
										</div>
										<div class="cart-btns">
											<a href="addcart.php">View Cart</a>
											<a href="checkout.php">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
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