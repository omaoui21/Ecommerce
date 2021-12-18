<?php 

session_start();
include('includes/config.php');
include('includes/functions.php');
		
 ?>
 <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		 <title>AMESIP SHOP</title>

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
	<?php 
		
		
		$get_ip=getRealIpUser();
		$select_cart="select * from cart where ip_add='$get_ip'";
		$run_cart=mysqli_query($connection,$select_cart);
		$check_cart=mysqli_num_rows($run_cart);
	
		if($check_cart==0 AND isset($_SESSION['email']))
		{
			
			echo" <script>window.open('store.php','_self')</script>";
		}
	if(!isset($_SESSION['email'])){
		echo" <script>window.open('login.php','_self')</script>";
		}
		else
		{
			
			
		
			
		
		
		?>
	<body>
		
	<?php 

            $ip_add=getRealIpUser();
			$total=0;
			$select_cart="select * from cart where ip_add='$ip_add'";
			$run_cart=mysqli_query($connection,$select_cart);
			while($record=mysqli_fetch_array($run_cart))
			{
				$pro_id=$record['p_id'];
				$pro_qty=$record['qte'];
				$get_price="select * from products where product_id='$pro_id'";
				$run_price=mysqli_query($connection,$get_price);

		
			while($row_price=mysqli_fetch_array($run_price))
			{
				$sub_total=$row_price['product_price']*$pro_qty;
				$total+=$sub_total;
				
			}
		}

?>
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> 05 03 94 02 99</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> AMESIP@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Centre Social Ain Atiq</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i><?php echo $total;?></a></li>
						<li><a href="login.php">
						<?php
						if(!isset($_SESSION['email']))
						{
							echo"<a href='login.php'><i class='fa fa-user-o'></i> Login</a>";
						}else
						{
							echo"<a href='logout.php'><i class='fa fa-user-o'></i> Log out</a>";
						}
						?>
						 </li>
						<li>
						
						<?php
						if(!isset($_SESSION['email']))
						{
							echo"<a href='Registrer.php'><i class='fa fa-user-plus'></i> Register</a>";
						}else
						{
							echo"<a href='myaccount.php'><i class='fa fa-user-plus'></i> Account</a>";
						}
						?>
						</li>
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
								<a href="index.php" class="logo">
									
							 <span class="label"><!--<img src="includes/AMA.PNG" alt="Amesip" width="200px" height="100px"> --> <h1 style="color: aliceblue;">AMESIP <i class="fa fa-shopping-cart"></i></h1></span> 
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">All Categories</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option>
									</select>
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
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
										<div class="qty"><?php echo items();?></div>
									</a>
								
									<div class="cart-dropdown">
										<div class="cart-list">
										<?php 
								$ip_add=getRealIpUser();
								$select_cart="select * from cart where ip_add='$ip_add'";
								$run_cart=mysqli_query($connection,$select_cart);
								$count=mysqli_num_rows($run_cart);
							?>
										<?php 
									$total=0;
							while($row_cart=mysqli_fetch_array($run_cart))
							{
								$pro_id=$row_cart['p_id'];
								$pro_size=$row_cart['size'];
								$pro_qty=$row_cart['qte'];
								$get_products="select * from products where product_id='$pro_id'";
								$run_products=mysqli_query($connection,$get_products);
								while($row_products=mysqli_fetch_array($run_products))
								{
									$product_title=$row_products['product_title'];
									$product_image=$row_products['product_image'];
									$product_price=$row_products['product_price'];
									$sub_total=$row_products['product_price']*$pro_qty;
									$total+=$sub_total;
									?>
											<div class="product-widget">
												<div class="product-img">
													<img src="Admin/product_images/<?php echo $product_image?>" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><strong><a href="product.php?pro_id=<?php echo $pro_id  ?>"><?php echo $product_title  ?></a></strong></h3>
													<h4 class="product-price"><span class="qty"><?php echo $pro_qty  ?></span>$50.00</h4>
												</div>
												
											</div>
											<?php 

										}
									}
									?>
										</div>
										<div class="cart-summary">
											<small><?php echo items();?> Item(s) selected</small>
											<h5>SUBTOTAL: $<?php echo $total;?>.00</h5>
										</div>
										<div class="cart-btns">
											<a href="cart.php">View Cart</a>
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

		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="store.php">Store</a></li>
						<li><a href="myaccount.php">My Account</a></li>
						<li><a href="Contacts.php">Contact Us</a></li>
						<li class="active"><a href="#">Autres</a></li>
					
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Checkout</li>
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

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="first-name" placeholder="First Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last-name" placeholder="Last Name">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Country">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telephone">
							</div>
							<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="create-account">
									<label for="create-account">
										<span></span>
										Create Account?
									</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
										<input class="input" type="password" name="password" placeholder="Enter Your Password">
									</div>
								</div>
							</div>
						</div>
						<!-- /Billing Details -->

						<!-- Shiping Details -->
						<div class="shiping-details">
							<div class="section-title">
								<h3 class="title">Shiping address</h3>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="shiping-address">
								<label for="shiping-address">
									<span></span>
									Ship to a diffrent address?
								</label>
								<div class="caption">
									<div class="form-group">
										<input class="input" type="text" name="first-name" placeholder="First Name">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="last-name" placeholder="Last Name">
									</div>
									<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="address" placeholder="Address">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="city" placeholder="City">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="country" placeholder="Country">
									</div>
									<div class="form-group">
										<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
									</div>
									<div class="form-group">
										<input class="input" type="tel" name="tel" placeholder="Telephone">
									</div>
								</div>
							</div>
						</div>
						<!-- /Shiping Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" placeholder="Order Notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<?php 
								$ip_add=getRealIpUser();
								$select_cart="select * from cart where ip_add='$ip_add'";
								$run_cart=mysqli_query($connection,$select_cart);
								$count=mysqli_num_rows($run_cart);
							?>
										<?php 
									$total=0;
							while($row_cart=mysqli_fetch_array($run_cart))
							{
								$pro_id=$row_cart['p_id'];
								$pro_size=$row_cart['size'];
								$pro_qty=$row_cart['qte'];
								$get_products="select * from products where product_id='$pro_id'";
								$run_products=mysqli_query($connection,$get_products);
								while($row_products=mysqli_fetch_array($run_products))
								{
									$product_title=$row_products['product_title'];
									$product_image=$row_products['product_image'];
									$product_price=$row_products['product_price'];
									$sub_total=$row_products['product_price']*$pro_qty;
									$total+=$sub_total;
									?>
									
							<div class="order-products">
								<div class="order-col">
									<div><?php echo $product_title?></div>
									<div>$<?php echo $product_price?>.00</div>
								</div>
							
							</div>
							<?php 

}
}
?>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">$<?php echo $total?>.00</strong></div>
							</div>

						</div>
	
						<div class="payment-method">
						
						
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3">
								<label for="payment-3">
									<span></span>
									Paypal System
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<?php 

                         $session_email=$_SESSION['email'];
						 $select_customer="select * from customers where customer_email='$session_email'";
						 $run_customer=mysqli_query($connection,$select_customer);
						 $row_customer=mysqli_fetch_array($run_customer);
						 $customer_id=$row_customer['customer_id'];
                        ?> 

						<a href="order.php?c_id=<?php echo $customer_id?>" class="primary-btn order-submit" style="background-color:#f1de2d;">Place order</a>
					</div>
					<!-- /Order Details -->
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
		<?php 
		}
	
		?>
		<?php 
		
		include('includes/footer.php');
		?>

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
