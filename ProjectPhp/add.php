 
<?php
session_start();
include 'connect.php';
$err1=$err2=$err3=$err4=$err5=$avt=$mess="";
if(isset($_POST['submit'])){

	$x=1;
	if(empty($_POST['title'])){
		$err1="Vui lòng nhập tên sản phẩm";
		$x=2;
	}
	if(empty($_POST['price'])){
		$err2="Vui lòng nhập giá tiền";
		$x=2;
	}
	

	

	if (!empty($_FILES['data']["name"])) {
		if ($_FILES['data']['error'] != 0) {
			$mess = "upload file lỗi" . $_FILES['data']['error'];
			$x=2;
		} else {
			$mb = $_FILES['data']['size'] / (1024 * 1024);
			$mess= "kích thước " . $mb . "=" . $_FILES['data']['size'];
			if ($mb > 1) {

				$mess= ' File Upload false ' . $mb . " cóbv kích thước > 1mb";
				$x=2;
			} else {
				$mangDuoiAnh = array("png", "jpg", "jpeg");
				$nameImg = $_FILES['data']['name'];
				$mangsaukhicat = explode(".", $nameImg);
				$duoianh = $mangsaukhicat[1];
				$check = in_array($duoianh, $mangDuoiAnh);

				if ($check == true) {
					move_uploaded_file($_FILES['data']['tmp_name'], 'images/severimg/' . $_FILES['data']['name']);
					$avt="images/severimg/".$_FILES['data']['name'];
				} else {
					$mess = "đuôi ảnh là " . $duoianh . " không hợp lệ";
					$x=2;
				}
			}
		}
	}
	else {
		$avt="";
	}
	
	if($x==1){
		$sql = "INSERT INTO product 
		(title, price, image, userid ) 
		VALUES (
			'".$_POST['title']."',
			'".$_POST['price']."',
			'".$avt."', 
			'".$_SESSION['id']."');";

			if ($result=$con->query($sql)) {
				header("Location: my-product.php");
				$mess= "thêm sản phẩm thành công Click vào <a href='my-product.php'>đây</a> để về trang my-product";
			}else{
				$mess= "Có lỗi xảy ra Click vào <a href='my-product.php'>đây</a> để về trang my-product";
			}

		}

	}

	?>


	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Blog | E-Shopper</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/prettyPhoto.css" rel="stylesheet">
		<link href="css/price-range.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->       
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="shortcut icon" href="images/ico/favicon.ico">
  	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
  	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
  	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
  	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
  	<style type="text/css">
  		thead>.cart_menu{
  			color: white;
  			text-align: center;
  		}
  		td{
  			text-align: center;
  		}
  		.my-form {

  			padding: 20px;
  			background-color: #f7f7f7;
  			border-radius: 5px;
  			width: 300px;
  			margin: 20px auto;
  		}

  		.my-form input[type="text"],
  		.my-form input[type="number"] {
  			width: 100%;
  			padding: 10px;
  			margin-bottom: 10px;
  			border: 1px solid #ccc;
  			border-radius: 3px;
  		}

  		.my-form p {
  			color: red;
  			font-size: 14px;
  			margin-bottom: 10px;
  		}

  		.my-form button[type="submit"] {
  			background-color: #4CAF50;
  			color: white;
  			padding: 10px 20px;
  			border: none;
  			border-radius: 3px;
  			cursor: pointer;
  		}

  		.my-form button[type="submit"]:hover {
  			background-color: #45a049;
  		}


  	</style>
  	
  </head><!--/head-->

  <body>
  	<header id="header"><!--header-->
  		<div class="header_top"><!--header_top-->
  			<div class="container">
  				<div class="row">
  					<div class="col-sm-6">
  						<div class="contactinfo">
  							<ul class="nav nav-pills">
  								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
  								<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
  							</ul>
  						</div>
  					</div>
  					<div class="col-sm-6">
  						<div class="social-icons pull-right">
  							<ul class="nav navbar-nav">
  								<li><a href=""><i class="fa fa-facebook"></i></a></li>
  								<li><a href=""><i class="fa fa-twitter"></i></a></li>
  								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
  								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
  								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
  							</ul>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div><!--/header_top-->

  		<div class="header-middle"><!--header-middle-->
  			<div class="container">
  				<div class="row">
  					<div class="col-md-4 clearfix">
  						<div class="logo pull-left">
  							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
  						</div>
  						<div class="btn-group pull-right clearfix">
  							<div class="btn-group">
  								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
  									USA
  									<span class="caret"></span>
  								</button>
  								<ul class="dropdown-menu">
  									<li><a href="">Canada</a></li>
  									<li><a href="">UK</a></li>
  								</ul>
  							</div>

  							<div class="btn-group">
  								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
  									DOLLAR
  									<span class="caret"></span>
  								</button>
  								<ul class="dropdown-menu">
  									<li><a href="">Canadian Dollar</a></li>
  									<li><a href="">Pound</a></li>
  								</ul>
  							</div>
  						</div>
  					</div>
  					<div class="col-md-8 clearfix">
  						<div class="shop-menu clearfix pull-right">
  							<ul class="nav navbar-nav">
  								<li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
  								<li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
  								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
  								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Cart</a></li>
  								<?php 
  								if(isset($_SESSION["id"])){
  									?>
  									<li><a href="logout.php"><i class="fa fa-shopping-cart"></i> Logout</a></li>
  									<?php
  								}else{
  									?>
  									<li><a href="login.php"><i class="fa fa-shopping-cart"></i> Login</a></li>
  									<?php 
  								}
  								?>
  							</ul>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div><!--/header-middle-->

  		<div class="header-bottom"><!--header-bottom-->
  			<div class="container">
  				<div class="row">
  					<div class="col-sm-9">
  						<div class="navbar-header">
  							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
  								<span class="sr-only">Toggle navigation</span>
  								<span class="icon-bar"></span>
  								<span class="icon-bar"></span>
  								<span class="icon-bar"></span>
  							</button>
  						</div>
  						<div class="mainmenu pull-left">
  							<ul class="nav navbar-nav collapse navbar-collapse">
  								<li><a href="index.html">Home</a></li>
  								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
  									<ul role="menu" class="sub-menu">
  										<li><a href="shop.html">Products</a></li>
  										<li><a href="product-details.html">Product Details</a></li> 
  										<li><a href="checkout.html">Checkout</a></li> 
  										<li><a href="cart.html">Cart</a></li> 
  										<?php 
  										if(isset($_SESSION["id"])){
  											?>
  											<li><a href="logout.php"><i class="fa fa-shopping-cart"></i> Logout</a></li>
  											<?php
  										}else{
  											?>
  											<li><a href="login.php"><i class="fa fa-shopping-cart"></i> Login</a></li>
  											<?php 
  										}
  										?>
  									</ul>
  								</li> 
  								<li class="dropdown"><a href="#" class="active">Blog<i class="fa fa-angle-down"></i></a>
  									<ul role="menu" class="sub-menu">
  										<li><a href="blog.html" class="active">Blog List</a></li>
  										<li><a href="blog-single.html">Blog Single</a></li>
  									</ul>
  								</li> 
  								<li><a href="404.html">404</a></li>
  								<li><a href="contact-us.html">Contact</a></li>
  							</ul>
  						</div>
  					</div>
  					<div class="col-sm-3">
  						<div class="search_box pull-right">
  							<input type="text" placeholder="Search"/>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div><!--/header-bottom-->
  	</header><!--/header-->

  	<section>
  		<div class="container">
  			<div class="row">
  				<div class="col-sm-3">
  					<div class="left-sidebar">
  						<h2>Account</h2>
  						<div class="panel-group category-products" id="accordian"><!--category-productsr-->


  							<div class="panel panel-default">
  								<div class="panel-heading">
  									<h4 class="panel-title"><a href="account.php">account</a></h4>
  								</div>
  							</div>
  							<div class="panel panel-default">
  								<div class="panel-heading">
  									<h4 class="panel-title"><a href="my-product.php">My product</a></h4>
  								</div>
  							</div>

  						</div><!--/category-products-->



  					</div>
  				</div>
  				<div class="col-sm-9">
  					<div class="table-responsive cart_info">
  						

       <?php if(isset($_SESSION["id"])){

 ?>



	<form method="POST" action="" class="my-form" enctype="multipart/form-data">

  							<input type="text" name="title" placeholder="Nhập tên sản phẩm"> <br>
  							<p ><?php echo $err1; ?></p>
  							<input type="number" name="price" placeholder="Nhập giá tiền"> <br>
  							<p ><?php echo $err2; ?></p>
  							
  							<div class="mb-3">
  								<input class="form-control form-control-sm" id="formFileSm" type="file" name="data">
  							</div>
  							<br>
  							<br>
  							
  							<button type="submit" style="background-color: #FE980F;font-size: 20px; border: 0;"  name="submit">Thêm Sản Phẩm</button>
  							<p style="color: red;"><?php  echo $mess; ?></p>
  						</form>

       <?php
}

       else{?>


       		<p>Bạn chưa đăng nhập ?<a href="login.php">Đăng Nhập Tại Đây</a></p>

									

       	  <?php
       }

        ?>

  					

  						


  					</div>
  				</div>
  			</div>
  		</div>
  	</section>

  	<footer id="footer"><!--Footer-->
  		<div class="footer-top">
  			<div class="container">
  				<div class="row">
  					<div class="col-sm-2">
  						<div class="companyinfo">
  							<h2><span>e</span>-shopper</h2>
  							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
  						</div>
  					</div>
  					<div class="col-sm-7">
  						<div class="col-sm-3">
  							<div class="video-gallery text-center">
  								<a href="#">
  									<div class="iframe-img">
  										<img src="images/home/iframe1.png" alt="" />
  									</div>
  									<div class="overlay-icon">
  										<i class="fa fa-play-circle-o"></i>
  									</div>
  								</a>
  								<p>Circle of Hands</p>
  								<h2>24 DEC 2014</h2>
  							</div>
  						</div>

  						<div class="col-sm-3">
  							<div class="video-gallery text-center">
  								<a href="#">
  									<div class="iframe-img">
  										<img src="images/home/iframe2.png" alt="" />
  									</div>
  									<div class="overlay-icon">
  										<i class="fa fa-play-circle-o"></i>
  									</div>
  								</a>
  								<p>Circle of Hands</p>
  								<h2>24 DEC 2014</h2>
  							</div>
  						</div>

  						<div class="col-sm-3">
  							<div class="video-gallery text-center">
  								<a href="#">
  									<div class="iframe-img">
  										<img src="images/home/iframe3.png" alt="" />
  									</div>
  									<div class="overlay-icon">
  										<i class="fa fa-play-circle-o"></i>
  									</div>
  								</a>
  								<p>Circle of Hands</p>
  								<h2>24 DEC 2014</h2>
  							</div>
  						</div>

  						<div class="col-sm-3">
  							<div class="video-gallery text-center">
  								<a href="#">
  									<div class="iframe-img">
  										<img src="images/home/iframe4.png" alt="" />
  									</div>
  									<div class="overlay-icon">
  										<i class="fa fa-play-circle-o"></i>
  									</div>
  								</a>
  								<p>Circle of Hands</p>
  								<h2>24 DEC 2014</h2>
  							</div>
  						</div>
  					</div>
  					<div class="col-sm-3">
  						<div class="address">
  							<img src="images/home/map.png" alt="" />
  							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>

  		<div class="footer-widget">
  			<div class="container">
  				<div class="row">
  					<div class="col-sm-2">
  						<div class="single-widget">
  							<h2>Service</h2>
  							<ul class="nav nav-pills nav-stacked">
  								<li><a href="">Online Help</a></li>
  								<li><a href="">Contact Us</a></li>
  								<li><a href="">Order Status</a></li>
  								<li><a href="">Change Location</a></li>
  								<li><a href="">FAQ’s</a></li>
  							</ul>
  						</div>
  					</div>
  					<div class="col-sm-2">
  						<div class="single-widget">
  							<h2>Quock Shop</h2>
  							<ul class="nav nav-pills nav-stacked">
  								<li><a href="">T-Shirt</a></li>
  								<li><a href="">Mens</a></li>
  								<li><a href="">Womens</a></li>
  								<li><a href="">Gift Cards</a></li>
  								<li><a href="">Shoes</a></li>
  							</ul>
  						</div>
  					</div>
  					<div class="col-sm-2">
  						<div class="single-widget">
  							<h2>Policies</h2>
  							<ul class="nav nav-pills nav-stacked">
  								<li><a href="">Terms of Use</a></li>
  								<li><a href="">Privecy Policy</a></li>
  								<li><a href="">Refund Policy</a></li>
  								<li><a href="">Billing System</a></li>
  								<li><a href="">Ticket System</a></li>
  							</ul>
  						</div>
  					</div>
  					<div class="col-sm-2">
  						<div class="single-widget">
  							<h2>About Shopper</h2>
  							<ul class="nav nav-pills nav-stacked">
  								<li><a href="">Company Information</a></li>
  								<li><a href="">Careers</a></li>
  								<li><a href="">Store Location</a></li>
  								<li><a href="">Affillate Program</a></li>
  								<li><a href="">Copyright</a></li>
  							</ul>
  						</div>
  					</div>
  					<div class="col-sm-3 col-sm-offset-1">
  						<div class="single-widget">
  							<h2>About Shopper</h2>
  							<form action="#" class="searchform">
  								<input type="text" placeholder="Your email address" />
  								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
  								<p>Get the most recent updates from <br />our site and be updated your self...</p>
  							</form>
  						</div>
  					</div>

  				</div>
  			</div>
  		</div>

  		<div class="footer-bottom">
  			<div class="container">
  				<div class="row">
  					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
  					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
  				</div>
  			</div>
  		</div>

  	</footer><!--/Footer-->



  	<script src="js/jquery.js"></script>
  	<script src="js/price-range.js"></script>
  	<script src="js/jquery.scrollUp.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	<script src="js/jquery.prettyPhoto.js"></script>
  	<script src="js/main.js"></script>
  </body>
  </html>