<?php 
session_start();
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
					<li class="active"><a href="myaccount.php">My Account</a></li>
					<li><a href="Contacts.php">Contact Us</a></li>
					<li ><a href="#">Autres</a></li>
				
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
						<h3 class="breadcrumb-header">Account Page</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">My Account</li>
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
				<?php 

$session_email=$_SESSION['email'];
$select_customer="select * from customers where customer_email='$session_email'";
$run_customer=mysqli_query($connection,$select_customer);
$row_customer=mysqli_fetch_array($run_customer);
$customer_image=$row_customer['customer_image'];
$customer_name=$row_customer['customer_name'];
if(!isset($_SESSION['email']))
{
 echo "You Need To Login First And Thanks . ";
}
else{


?> 
					<h3 class="title">My Informations :  </h3>
				</div>
				


	<img src="customer_images/<?php echo $customer_image  ?>" style="width:150px;border-radius:100px;" alt="">

<h2 style="font-family:cursive;"> Name :  <?php echo $customer_name ?></h2>


				</div>
			</div>
			<!-- /Billing Details -->
			<div class="billing-details">
				<div class="section-title">
					<h3 class="title">My Orders :  </h3>
				</div>
				
				<style>



table tr th {
    background:orange;    
}


th{
										color:white;
									}
		</style>		

 <div class="table-responsive">
<table class="table">
	<thead>
	<tr>
	<th>
#
	</th>
	<th>
due Amount
	</th>
	<th>
	Invoice On 	
	</th>
	<th>
		Qty
	</th>
	<th>
		Size
	</th>
	<th>
		Date Order
	</th>

	
</tr>
	</thead>
	<tbody>
			
	<?php 

$session_email=$_SESSION['email'];
$select_customer="select * from customers where customer_email='$session_email'";
$run_customer=mysqli_query($connection,$select_customer);
$row_customer=mysqli_fetch_array($run_customer);
$customer_id=$row_customer['customer_id'];
$get_order="select * from customer_orders where customer_id='$customer_id'";
$run_order=mysqli_query($connection,$get_order);
$i=0;
while($row_order=mysqli_fetch_array($run_order))
{
	$order_id=$row_order['order_id'];
	$due_amount=$row_order['due_amount'];
	$invoice=$row_order['invoice_on'];
	$qty=$row_order['qty'];
	$size=$row_order['size'];
	$order_date=substr($row_order['order_date'],0,11);
	$i++;


?> 
<tr>
<td>
	<?php echo $i ?>
	</td>
	<td>
	<?php echo $due_amount.DH ?>
	</td>
	<td>
	<?php echo $invoice  ?>
	</td>
	<td>
	<?php echo $qty  ?>
	</td>
	<td>
	<?php echo $size  ?>
	</td>
	<td>
	<?php echo $order_date  ?>
	</td>


</tr>
<?php 
}
?> 
	</tbody>
</table>

		
	
		</div>
		</div>
		<?php 
}
?> 
				</div>
			</div>
		
	
		</div>

	
	</div>
	<!-- /row -->
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
