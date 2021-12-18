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
	<body>
	<!-- HEADER -->
		
	<?php 
		include('includes/header.php');
	

		?>
	
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li ><a href="store.php">Store</a></li>
						<li><a href="myaccount.php">My Account</a></li>
						<li><a href="Contacts.php">Contact Us</a></li>
						<li  class="active"><a href="#">Autres</a></li>
					
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->
		<?php 
			

            if(isset($_GET['pro_id']))
	{
        $pro_id=$_GET['pro_id'];

        $get_products="select * from products where product_id='$pro_id'";
        $run_products=mysqli_query($connection,$get_products);
		$row_products=mysqli_fetch_array($run_products);
        $count=mysqli_num_rows($run_products);
       
		if($count==1)
		{
			$pro_title=$row_products['product_title'];
			$pro_price=$row_products['product_price'];
			$price_old=$row_products['price_old'];
			$pro_image=$row_products['product_image'];
			$pro_desc=$row_products['product_desc'];
			$pro_id=$row_products['product_id'];
		}
	}	
		?>
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
							<img src="Admin/product_images/<?php echo $pro_image  ?>" alt="">
							</div>

					
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
							<img src="Admin/product_images/<?php echo $pro_image  ?>" alt="">
							</div>

							
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?php echo $pro_title  ?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								
							</div>
							<div>
								<h3 class="product-price">$<?php echo $pro_price  ?>.00 <del class="product-old-price">$<?php echo $price_old  ?>.00</del></h3>
								<span class="product-available">In Stock</span>
								
							</div>
							
							<pre><?php echo $pro_desc  ?></pre>
						<form action="product.php?add_cart=<?php echo $pro_id  ?>" method="post">

							<div class="add-to-cart">
									Qty
									<div class="input-number">
										<input type="number" name="product_qty" required>
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
									<select class="input-select" name="product_size" required >
										<option value="0" disabled>All Categories</option>
										<option value="small">small</option>
										<option value="meduim">meduim</option>
										<option value="tall">tall</option>
							</select>
								
							
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart" ></i> add to cart</button>
							</div>
							
							
							</form>
							<?php 
						
						
								global $connection;
								if(isset($_GET['add_cart']))
								{
								$ip_add=getRealIpUser();
								$p_id=$_GET['add_cart'];
								$product_qty=$_POST['product_qty'];
								$product_size=$_POST['product_size'];
								$check_product="select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
								$run_product=mysqli_query($connection,$check_product);
								if(mysqli_num_rows($run_product)>0)
								{
									echo "<script>alert('This is Product has Already added to cart')</script>";
									echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";
									
								}
								else
								{
									$query ="insert into cart(p_id,ip_add,qte,size) values('$p_id','$ip_add','$product_qty','$product_size')";
									$run_query=mysqli_query($connection,$query);
								
										echo "<script>window.open('product.php?pro_id=$p_id','_self')</script>";
									
								
									
								}
					
							}
					
							
							
							?>

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">Headphones</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
							
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									
									<div class="row">
										<div class="col-md-12">
										<pre><?php echo $pro_desc  ?></pre>
										</div>
								
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

							
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title"> Products You Maybe Like</h3>
						</div>
					</div>
			<?php
				
				$get_products="select * from products order by rand() LIMIT 0,3";
				$run_products=mysqli_query($connection,$get_products);
				while($row_products=mysqli_fetch_array($run_products))
									
				{
			$pro_title=$row_products['product_title'];
			$pro_price=$row_products['product_price'];
			$pro_image=$row_products['product_image'];
			$price_old=$row_products['price_old'];
			$pro_desc=$row_products['product_desc'];
			$pro_id=$row_products['product_id'];
				
			?>
						<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="Admin/product_images/<?php echo $pro_image  ?>" alt="">
										<div class="product-label">
											<span class="sale">-30%</span>
											<span class="new">NEW</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?pro_id=<?php echo $pro_id ?>"><?php echo $pro_title ?></a></h3>
										<h4 class="product-price">$<?php echo $pro_price ?>.00 <del class="product-old-price">$<?php echo $price_old ?>.00</del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>

											<button class="quick-view"><a href="product.php?pro_id=<?php echo $pro_id ?>"><i class="fa fa-eye"></i></a></i><span class="tooltipp">quick view</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
									</div>
								</div>
	
							</div>
							<?php 
							
							
						}
	

?>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

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
