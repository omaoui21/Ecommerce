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
						<h3 class="breadcrumb-header">Registre Page</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Registre</li>
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
					<h3 class="title">Créer un compte</h3>
				</div>
				<form action="Registrer.php" method="POST" enctype="multipart/form-data">
				<label for="">Your Name : </label>
				<div class="form-group">
					<input class="input" type="text" name="name" placeholder="Full Name" required>
				</div>
				<label for="">Your E-mail : </label>
				<div class="form-group">
					<input class="input" type="email" name="email" placeholder="Email" required>
				</div>
				<label for="">Your Password : </label>
				<div class="form-group">
					<input class="input" type="password" name="password" placeholder="password" required >
				</div>
				<label for="">Your Country : </label>
				<div class="form-group">
					<input class="input" type="text" name="country" placeholder="Country" required>
				</div>
				<label for="">Your City : </label>
				<div class="form-group">
					<input class="input" type="text" name="city" placeholder="City" required>
				</div>
				<label for="">Your Contact : </label>
				<div class="form-group">
					<input class="input" type="text" name="contact" placeholder="Telephone" required>
				</div>
				<label for="">Your Address : </label>
				<div class="form-group">
					<input class="input" type="text" name="address" placeholder="Address" required>
				</div>
				<label for="">Your Profile Picture : If you have it  </label>
				<div class="form-group">
					<input class="input" type="file" name="image" >
				</div>
				
		
				
					
				<button class="primary-btn order-submit" name="register" style="background-color:#ffbd07;" type="submit">Register</button>
					
				</div>
				</form>
			</div>
			<!-- /Billing Details -->

		
	
		</div>

	
	</div>
	<!-- /row -->
    </div>

		</div>
		<!-- /SECTION -->
		<?php 
	if(isset($_POST['register']))
	{
		$c_name=$_POST['name'];
		$c_email=$_POST['email'];
		$c_password=$_POST['password'];
		$c_country=$_POST['country'];
		$c_city=$_POST['city'];
		$c_contact=$_POST['contact'];
		$c_address=$_POST['address'];
		$c_ip=getRealIpUser();
		$file_name = "";  
		$customer="select * from customers where customer_email='$c_email'";
		$customers=mysqli_query($connection,$customer);
		if($customers)
		{
			echo" <script>alert('Your Already have Account With this E-mail')</script>";
			echo" <script>window.open('Registrer.php','_self')</script>";
			
		}
		else
		{

		
		if(isset($_FILES['image']['error'])){
			if($_FILES['image']['error'] == 0){
		 
				$target_dir = "customer_images/";
				
				$file_name = time()."_".rand(100000,10000000).rand(100000,10000000)."_".$_FILES["image"]["name"];

				$file_name = str_replace(" ", "_", $file_name);
 

				$source = $_FILES["image"]["tmp_name"];
				$destinatin = $target_dir.$file_name;
				
				 if(move_uploaded_file($source, $destinatin)){
				 	 
				 }else{
				 	$file_name = "";
				 }
			}
        }
$insert_customer="INSERT INTO customers(customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip) VALUES ('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$file_name','$c_ip')";
$run_customer=mysqli_query($connection,$insert_customer);
$sel_cart="select * from cart where ip_add='$c_ip'";
$run_cart=mysqli_query($connection,$sel_cart);
$check_cart=mysqli_num_rows($run_cart);
if($check_cart>0)
{
$_SESSION['email']=$c_email;
echo" <script>alert('You have been  Registered successfully')</script>";
echo" <script>window.open('checkout.php','_self')</script>";
}
else
{
	$_SESSION['email']=$c_email;
	echo" <script>alert('You have been  Registered successfully')</script>";
	echo" <script>window.open('index.php','_self')</script>";
}
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
