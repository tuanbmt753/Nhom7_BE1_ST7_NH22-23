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
												require "models/manufactures.php ";
                                            
                                                $products = new Products();
                                                $protypes = new Protypes();
												$manufactures = new Manufactures();
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
											<h5>SUBTOTAL: $<?php echo number_format( $tong);?></h5>
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

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<?php
							foreach ($getAllProtypes as $key => $value) {?>	
								<li><a href=""><?php echo $value['type_name'];?></a></li>								
						<?php
							}
						?>					
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li><a href="#">Accessories</a></li>
							<li class="active">Headphones (227,490 Results)</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>

							<div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
								<?php 
									$getAllTypes  = $protypes->getAllProtypes();
									foreach ($getAllTypes as $key => $value) {										
								?>
								<div class="list-group-item checkbox">
									<label>
										<input type="checkbox" class="common_selector brand" value="<?php echo $value['type_id'];?>" >
										<?php 
											echo $value['type_name']; 
											$getProductByType_id =  $products->getProductByType_id($value['type_id']);
											$demProductByType_id = 0;
											foreach ($getProductByType_id as $key => $value) {
												$demProductByType_id = $demProductByType_id +1;
											}
										?>
										<small>(<?php echo $demProductByType_id; ?>)</small>
									</label>
								</div>
								<?php
									} 
								?>		
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>

						
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Brand</h3>
							<!-- <div class="checkbox-filter">		
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										SAMSUNG
										<small>(578)</small>
									</label>
								</div>								
							</div> -->
							<div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
								<?php
									$getAllManufactures = $manufactures->getAllManufactures();
									foreach ($getAllManufactures as $key => $value) {
								?>
								<div class="list-group-item checkbox">
									<label>
										<input type="checkbox" class="common_selector brand" value="<?php echo $value['manu_id']; ?>" >
										<?php
											echo $value['manu_name'];
											$getAllProductsByManuID = $products->getProductByManu_id($value['manu_id']);
											$demProductByManu_id = 0;
											foreach ($getAllProductsByManuID as $key => $value) {
												$demProductByManu_id = $demProductByManu_id + 1;
											}	
										?>		
										<small>(<?php echo $demProductByManu_id;?>)</small>
									</label>
								</div>
								<?php } ?>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Top selling</h3>

							<?php 
								$topSelling = $products->getTopThreeSelling(0);
								foreach ($topSelling as $key => $value) {											
							 ?>
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/<?php echo  $value['image']; ?>" alt="">
								</div>
								<div class="product-body">
									<p class="product-category"><?php echo  $value['type_name']; ?></p>
									<h3 class="product-name"><a href="product.php?id=<?php echo $value['id']; ?>"><?php echo  substr( $value['name'],0,22); ?>...</a></h3>
									<h4 class="product-price"><?php echo  number_format( $value['price']); ?>VND<del class="product-old-price">990.00VND</del></h4>
								</div>
							</div>
							<?php } ?>

						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<?php			
								$total = 0; //Tổng số kết quả trả về
								$perPage = 5;// Số kết quả hiển thị trên 1 trang
								$totalLinks = 0;//Tổng số trang hiển thị
								$page = 1; //Số trang đang hiển thị
								if(isset($_GET['page'])){
									$page = $_GET['page'];
								}
								
								$firstLink = 1; //Số thứ tự trang bắt đầu hiển thị
								$lastLink = 5; //Số thứ tự trang kết thúc
								$prevLink = 4; //Liên kết tới trang trước đó
								$nextLink = 6; // Liên kết tới trang kế tiếp
								$url="result.php";// Hàm trả về tên file hiện hành
								
								if(isset($_GET['keyword'])) {
									$_SESSION['keyword'] = $_GET['keyword'];
								}
								if(isset($_SESSION['keyword'])) {	
									$keyword = $_SESSION['keyword'];
									$search = $products->search($keyword);
									foreach ($search as $key => $value) {
									$total = $total + 1;
									}
								}
								
								$getAllProducts2 = $products->getAllProducts2( $_SESSION['keyword'],$page*1,$perPage);
								foreach ($getAllProducts2 as $key => $value) { ?>
								 		<!-- product -->
								<div class="col-md-4 col-xs-6">
											<div class="product">
												<div class="product-img">
													<img src="./img/<?php echo $value['image'];?>" alt="">
													<div class="product-label">
				
													</div>
												</div>
												<div class="product-body">
													<p class="product-category"><?php echo $value['type_name']; ?></p>
													<h3 class="product-name"><a href="product2.php?id=<?php echo $value['id']; ?>"><?php echo substr( $value['name'],0,25);?>...</a></h3>
													<h4 class="product-price"><?php echo  number_format( $value['price']); ?>VND </h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="product-btns">
														<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
														<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
														<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
													</div>
												</div>
												<div class="add-to-cart">
													<a href="addcart2.php?id3=<?php echo $value['id']; ?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
												</div>
											</div>
										</div>
							<!-- /product -->
							<?php
								}
							?>
						
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination">
								<!-- <li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li> -->
								<?php echo $products-> paginate($url, $total, $perPage); ?>
								<!-- <li><a href="#"><i class="fa fa-angle-right"></i></a></li> -->
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
		<script>
			$(document).ready(function(){

				filter_data();

				function filter_data()
				{
					$('.filter_data').html('<div id="loading" style="" ></div>');
					var action = 'fetch_data';
					var minimum_price = $('#hidden_minimum_price').val();
					var maximum_price = $('#hidden_maximum_price').val();
					var brand = get_filter('brand');
					var ram = get_filter('ram');
					var storage = get_filter('storage');
					$.ajax({
						url:"fetch_data.php",
						method:"POST",
						data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage},
						success:function(data){
							$('.filter_data').html(data);
						}
					});
				}

				function get_filter(class_name)
				{
					var filter = [];
					$('.'+class_name+':checked').each(function(){
						filter.push($(this).val());
					});
					return filter;
				}

				$('.common_selector').click(function(){
					filter_data();
				});

				$('#price_range').slider({
				    range:true,
				    min:1000,
				    max:65000,
				    values:[1000, 65000],
				    step:500,
				    stop:function(event, ui)
				    {
				        $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
				        $('#hidden_minimum_price').val(ui.values[0]);
				        $('#hidden_maximum_price').val(ui.values[1]);
				        filter_data();
				    }
				});

			});
		</script>

	</body>
</html>
