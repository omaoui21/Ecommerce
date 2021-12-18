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
					<li ><a href="index.php">Home</a></li>
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
	<!-- /NAVIGATION -->
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Login Page</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Login</li>
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
   
	<div class="row">

		<div class="col-md-7">
			<!-- Billing Details -->
			<div class="billing-details">
				<div class="section-title">
					<h3 class="title">Se Connectez</h3>
				</div>
				<form action="login.php" method="post">
				<div class="form-group">
					<input class="input" type="text" name="c_email" placeholder="E-mail">
				</div>
				<div class="form-group">
					<input class="input" type="password" name="c_password" placeholder="Password">
				</div>
		
				
					
				<button class="primary-btn order-submit" name="login" style="background-color:#ffbd07;" type="submit">Login</button>
				</form>
				</div>
			</div>
			<!-- /Billing Details -->

		
	
		</div>

	
	</div>
	<!-- /row -->
    </div>

		</div>
		<!-- /SECTION -->
		<?php 
        if(isset($_POST['login']))
		{
			$customer_email=$_POST['c_email'];
			$customer_password=$_POST['c_password'];
			$select_customer="select * from customers where customer_email='$customer_email' AND customer_pass='$customer_password' ";
			$run_customer=mysqli_query($connection,$select_customer);
			$get_ip=getRealIpUser();
			$check_customer=mysqli_num_rows($run_customer);
			$select_cart="select * from cart where ip_add='$get_ip'";
			$run_cart=mysqli_query($connection,$select_cart);
			$check_cart=mysqli_num_rows($run_cart);
			if($check_customer==0)
			{
				echo" <script>alert('Your Password and email are wrong')</script>";
				exit();
			}
			if($check_customer==1 AND $check_cart==0)
			{
				$_SESSION['email']=$customer_email;
				echo" <script>alert('You Are logged in ')</script>";
				echo" <script>window.open('store.php','_self')</script>";
			}
			else{
				$_SESSION['email']=$customer_email;
				echo" <script>alert('You Are logged in ')</script>";
				echo" <script>window.open('checkout.php','_self')</script>";
			}

		}
 ?>
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
<br><br>
		<!-- FOOTER -->
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
