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
    ?>

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="store.php">Store</a></li>
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
<style>
	#myCarousel .carousel-item .mask {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-attachment: fixed
}

#myCarousel h4 {
    font-size: 50px;
    color: #FFF;
    line-height: 100%;
    letter-spacing: 0.5px;
	margin-top: 100px;
    font-weight: 600
}

#myCarousel p {
    font-size: 20px;
	margin-top: 23px;
    color: #d5d5d5
}

#myCarousel .carousel-item a {
    background: #ffbd07;
    font-size: 14px;
    color: #FFF;
    padding: 13px 32px;
    display: inline-block

}

#myCarousel .carousel-item a:hover {
    background: #ffbd07;
    text-decoration: none
}

#myCarousel .carousel-item h4 {
    -webkit-animation-name: fadeInLeft;
    animation-name: fadeInLeft
}

#myCarousel .carousel-item p {
    -webkit-animation-name: slideInRight;
    animation-name: slideInRight
}

#myCarousel .carousel-item a {
    -webkit-animation-name: fadeInUp;
    animation-name: fadeInUp
}

#myCarousel .carousel-item .mask img {
    -webkit-animation-name: slideInRight;
    animation-name: slideInRight;
    display: block;
    height: auto;
    max-width: 100%
}

#myCarousel h4,
#myCarousel p,
#myCarousel a,
#myCarousel .carousel-item .mask img {
    -webkit-animation-duration: 1s;
    animation-duration: 1.2s;
    -webkit-animation-fill-mode: both;
    animation-fill-mode: both
}


#myCarousel .carousel-item {
    height: 100%;
    min-height: 550px

	
}
.carousel {
    border-radius: 13px 13px 13px 13px;
    overflow: hidden;

}

#myCarousel {
    position: relative;
    z-index: 1;
    background: black;
    background-size: cover
}

.carousel-control-next{
	padding:  8px 20px 20px 20px;;
    transform: translateY(-50%);
    background-color: #ffbd07;
	margin-bottom: 10%;
	color: white;
	border-radius: 8px;
}

.carousel-item {
    position: relative;
    display: none;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    width: 100%;
    transition: -webkit-transform .6s ease;
    transition: transform .6s ease;
    transition: transform .6s ease, -webkit-transform .6s ease;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-perspective: 1000px;
    perspective: 1000px;
}

.carousel-fade .carousel-item {
    opacity: 0;
    -webkit-transition-duration: .6s;
    transition-duration: .6s;
    -webkit-transition-property: opacity;
    transition-property: opacity
}

.carousel-fade .carousel-item-next.carousel-item-left,
.carousel-fade .carousel-item-prev.carousel-item-right,
.carousel-fade .carousel-item.active {
    opacity: 1
}

.carousel-fade .carousel-item-left.active,
.carousel-fade .carousel-item-right.active {
    opacity: 0
}

.carousel-fade .carousel-item-left.active,
.carousel-fade .carousel-item-next,
.carousel-fade .carousel-item-prev,
.carousel-fade .carousel-item-prev.active,
.carousel-fade .carousel-item.active {
    -webkit-transform: translateX(0);
    -ms-transform: translateX(0);
    transform: translateX(0)
}

@supports (transform-style:preserve-3d) {

    .carousel-fade .carousel-item-left.active,
    .carousel-fade .carousel-item-next,
    .carousel-fade .carousel-item-prev,
    .carousel-fade .carousel-item-prev.active,
    .carousel-fade .carousel-item.active {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }
}

.carousel-fade .carousel-item-left.active,
.carousel-fade .carousel-item-next,
.carousel-fade .carousel-item-prev,
.carousel-fade .carousel-item-prev.active,
.carousel-fade .carousel-item.active {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0)
}

@-webkit-keyframes fadeInLeft {
    from {
        opacity: 0;
        -webkit-transform: translate3d(-100%, 0, 0);
        transform: translate3d(-100%, 0, 0)
    }

    to {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }
}

@keyframes fadeInLeft {
    from {
        opacity: 0;
        -webkit-transform: translate3d(-100%, 0, 0);
        transform: translate3d(-100%, 0, 0)
    }

    to {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }
}

.fadeInLeft {
    -webkit-animation-name: fadeInLeft;
    animation-name: fadeInLeft
}

@-webkit-keyframes fadeInUp {
    from {
        opacity: 0;
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0)
    }

    to {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0)
    }

    to {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }
}

.fadeInUp {
    -webkit-animation-name: fadeInUp;
    animation-name: fadeInUp
}

@-webkit-keyframes slideInRight {
    from {
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
        visibility: visible
    }

    to {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }
}

@keyframes slideInRight {
    from {
        -webkit-transform: translate3d(100%, 0, 0);
        transform: translate3d(100%, 0, 0);
        visibility: visible
    }

    to {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0)
    }
}

.slideInRight {
    -webkit-animation-name: slideInRight;
    animation-name: slideInRight
}
</style>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
<script>
	$(document).ready(function(){

$('#myCarousel').carousel({
interval: 3000,
})

});
</script>
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
		
				<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<div class="mask flex-center">
								<div class="container">
									<div class="row align-items-center">
										<div class="col-md-7 col-12 order-md-1 order-2">
											<h4>Fashion with T-shirt</h4>
											<p style="color: #f0f0f0;">Djalaba est une longue robe ample avec un capuchon, portée par les hommes et les femmes.</p> <br> <a href="#">BUY NOW</a>
										</div>
										<div class="col-md-5 col-12 order-md-2 order-1"><img src="img/shirt.png" class="mx-auto" alt="slide"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<div class="mask flex-center">
								<div class="container">
									<div class="row align-items-center">
										<div class="col-md-7 col-12 order-md-1 order-2">
											<h4>Fashion with T-shirt</h4>
											<p style="color: #f0f0f0;">Djalaba est une longue robe ample avec un capuchon, portée par les hommes et les femmes.</p> <br> <a href="#">BUY NOW</a> 
										</div>
										<div class="col-md-5 col-12 order-md-2 order-1"><img src="img/shirt1.png" class="mx-auto" alt="slide"></div>
									</div>
								</div>
							</div>
						</div>
					</div> <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> next</a>
				</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
						
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
									<?php
				
				$get_products="select * from products order by rand() LIMIT 0,5";
				$run_products=mysqli_query($connection,$get_products);
				while($row_products=mysqli_fetch_array($run_products))
									
				{
			$pro_title=$row_products['product_title'];
			$pro_price=$row_products['product_price'];
			$pro_image=$row_products['product_image'];
			$pro_desc=$row_products['product_desc'];
			$price_old=$row_products['price_old'];
			$pro_id=$row_products['product_id'];
				
			?>
										<!-- product -->
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
										<!-- /product -->
										<?php 
							
							
					                             	}
	
                                       ?>
									
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
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
<br>
<br>
<?php 
    include('includes/footer.php');
    ?>
		<!-- /FOOTER -->
		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
