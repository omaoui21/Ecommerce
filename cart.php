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
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="store.php">Store</a></li>
						<li><a href="#">Promotion</a></li>
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
						<h3 class="breadcrumb-header">Cart Shopping</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Cart Shopping</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
		<div class="container">	
		<div class="container bootstrap snippets bootdey">
    <div class="col-md-9 col-sm-8 content">
        <div class="row">
            <div class="col-md-12">
			<?php 
								$ip_add=getRealIpUser();
								$select_cart="select * from cart where ip_add='$ip_add'";
								$run_cart=mysqli_query($connection,$select_cart);
								$count=mysqli_num_rows($run_cart);
							?>
			<ol class="breadcrumb">
				<center>
                  <li>You currently have <?php echo $count; ?> item(s) in your cart</li>
				  </center>
                </ol>
            </div>
        </div>
		<style>
			.img-cart {
    display: block;
    max-width: 50px;
    height: auto;
    margin-left: auto;
    margin-right: auto;
}


table tr th {
    background:orange;    
}

.panel-shadow {
    box-shadow: rgba(0, 0, 0, 0.3) 4px 4px 4px;
}
.panel-shadow:hover {
    box-shadow: rgba(0, 0, 0, 0.3) 6px 6px 6px;
}

		</style>
			<?php 
		
		?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info panel-shadow">
                   
                    <div class="panel-body"> 
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
							
                            <tr>
								<style>
									th{
										color:white;
									}
								</style>
                                <th>Product</th>
                                <th>Description</th>
                                <th>Qty</th>
                                <th>Price</th>
								<th>Delete</th>
								<th>sub_total</th>

                            </tr>
                            </thead>
                            <tbody>
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
								<tr>
                                    <td><img src="Admin/product_images/<?php echo $product_image?>" class="img-cart"></td>
                                    <td><strong><a href="product.php?pro_id=<?php echo $pro_id  ?>"><?php echo $product_title  ?></a></strong><p>Size : <?php echo $pro_size  ?></p></td>
                                    <td>
                                
                                       <?php echo $pro_qty  ?>
                                        
                                     
                                   
                                    </td>
                                    <td>$<?php echo $product_price  ?>.00</td>
									<td>
							   <a href="cart.php?del_id=<?php echo $pro_id ?>" class="btn btn-warning"><i class="fa fa-trash-o"></i></a>
							   </td>
							   <td>
							   $<?php echo $sub_total?>.00
							   </td>
                                </tr>
                        
							  
					
                               
                               
								<?php 
									}
}
								if($_GET['del_id'])
                                    {
                                        $id=$_GET['del_id'];
                                          $sql = "DELETE FROM cart WHERE p_id='$id'";
                                          $resultat=mysqli_query($connection,$sql);
                                        if($resultat)
	                                    {
											echo "<script>window.open('cart.php','_self')</script>";
										}
	                            	}
	
								?>
								
								<tr>
								<td>
								<strong>	Total : $<?php echo $total  ?></strong>
								</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <a href="store.php" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Continue Shopping</a>
                <a href="#" class="btn btn-warning pull-right">Next<span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
    </div>
	
</div>
</div>
<br>
<br>

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
