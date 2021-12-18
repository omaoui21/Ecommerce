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

	
    </head>
	<body>
		<?php 
		include('includes/header.php');
		include('includes/function.php');
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
						<li  class="active"><a href="store.php">Store</a></li>
						<li><a href="myaccount.php">My Account</a></li>
						<li><a href="Contacts.php">Contact Us</a></li>
						<li><a href="#">Autres</a></li>
					
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->


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
							<h3 class="aside-title"> Produts Categories</h3>
							<div class="checkbox-filter">
							<?php 
		include('includes/config.php');
		$get_p_cats="select * from product_categories";
		$run_p_cats = mysqli_query($connection ,$get_p_cats);
		while($row_p_cats=mysqli_fetch_array($run_p_cats))
		{
		$p_cat_id=$row_p_cats['p_cat_id'];
		$p_cat_title=$row_p_cats['p_cat_title'];

		
		?>
								
	
								<div class="input-checkbox">
								
									<label for="category-1">
										<span></span>
										<a href="store.php?p_cat=<?php echo $p_cat_id ?>"><?php echo $p_cat_title ?></a>			
										
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
							<h3 class="aside-title">Categories</h3>
							<?php 
		include('includes/config.php');
		$get_cats="select * from categories";
		$run_cats = mysqli_query($connection ,$get_cats);
		while($row_cats=mysqli_fetch_array($run_cats))
		{
		$cat_id=$row_cats['cat_id'];
		$cat_title=$row_cats['cat_title'];

		
		?>
							<div class="input-checkbox">
								
									<label for="category-1">
										<span></span>
										<a href="store.php?cat=<?php echo $cat_id ?>"><?php echo $cat_title ?></a>			
										
									</label>
								</div>
							
								<?php 
		}
		?>
				
							
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								
								<label style="font-size: 25px;font-weight: 900;">
									Products :
									
								</label>
							</div>
							</div>
						<!-- /store top filter -->
						<?php
						if(!isset($_GET['p_cat']))
	{
		if(!isset($_GET['cat']))
		{
			$per_page=9;
			if(isset($_GET['page']))
			{
				$page=$_GET['page'];
			}
			else{
				$page=1;
			}
			$start_from=($page-1) * $per_page;
		$get_products="select * from products order by 1 DESC limit $start_from,$per_page";
		$run_products = mysqli_query($connection ,$get_products);
		while($row_products=mysqli_fetch_array($run_products))
		{
			$pro_title=$row_products['product_title'];
			$pro_price=$row_products['product_price'];
			$price_old=$row_products['price_old'];
			$pro_image=$row_products['product_image'];
			$pro_id=$row_products['product_id'];
		
		?>

			
						<!-- store products -->
					
							<!-- product -->
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
										<h4 class="product-price">$<?php echo $pro_price ?>.00 <del class="product-old-price">$<?php echo $price_old  ?>.00</del></h4>
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
							}
							
						
		}
        
		?>
		 <?php 
			     
        
            if(isset($_GET['p_cat']))
	{
        $p_cat_id=$_GET['p_cat'];
		$get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
        $run_p_cat=mysqli_query($connection,$get_p_cat);
        $row_p_cat=mysqli_fetch_array($run_p_cat);
        $p_cat_title=$row_p_cat['p_cat_title'];
        $p_cat_desc=$row_p_cat['p_cat_desc'];
        $get_products="select * from products where p_cat_id='$p_cat_id'";
        $run_products=mysqli_query($connection,$get_products);
        $count=mysqli_num_rows($run_products);
        if($count==0)
        {
            echo "No Products Found in this Product Categories";
        }
        else{
            	
		?>

      
		 <div>
			<h3>
			<?php
	echo $p_cat_title;	
      ?>
			</h3>				
	<h4>
	<?php
	echo $p_cat_desc;	
      ?>
	  </h4>
		</div>
         
         
                            <?php 
							
        }
		while($row_products=mysqli_fetch_array($run_products))
		{
			$pro_title=$row_products['product_title'];
			$pro_price=$row_products['product_price'];
			$pro_image=$row_products['product_image'];
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
										<h4 class="product-price">$<?php echo $pro_price ?>.00 <del class="product-old-price">$100.00</del></h4>
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
        }
    
		?>	
		
		
		<?php 
			     
        
				 if(isset($_GET['cat']))
		 {
			 $cat_id=$_GET['cat'];
			 $get_cat="select * from categories where cat_id='$cat_id'";
			 $run_cat=mysqli_query($connection,$get_cat);
			 $row_cat=mysqli_fetch_array($run_cat);
			 $cat_title=$row_cat['cat_title'];
			 $cat_desc=$row_cat['cat_desc'];
			 $get_products="select * from products where cat_id='$cat_id'";
			 $run_products=mysqli_query($connection,$get_products);
			 $count=mysqli_num_rows($run_products);
			 if($count==0)
			 {
				 echo "No Products Found in this  Categories";
			 }
			 else{
					 
			 ?>
	 
		   
			  <div>
				 <h3>
				 <?php
		 echo $cat_title;	
		   ?>
				 </h3>				
		 <h4>
		 <?php
		 echo $cat_desc;	
		   ?>
		   </h4>
			 </div>
			  
			  
								 <?php 
								 
			 }
			 while($row_products=mysqli_fetch_array($run_products))
			 {
				 $pro_title=$row_products['product_title'];
				 $pro_price=$row_products['product_price'];
				 $pro_image=$row_products['product_image'];
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
											 <h4 class="product-price">$<?php echo $pro_price ?>.00 <del class="product-old-price">$100.00</del></h4>
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
			 }
		 
			 ?>	

			 </div>
			 </div>
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
		
	
	<br>
		
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
