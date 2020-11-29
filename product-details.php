<!DOCTYPE html>
<html lang="en">
<?php 
include('includes/config.php');
if($_GET['pid']){
	$pid = $_GET['pid'];
	$sql=mysqli_query($con,"SELECT * FROM products WHERE id= $pid");
	while($row=mysqli_fetch_array($sql)){
	}
	
}else{
	header("location:/eshopper");
}
if(isset($_POST['reviewsubmit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$review=$_POST['review'];
$query=mysqli_query($con,"insert IGNORE  into productreviews(productId,name,email,review) 
values ('$pid','$name','$email','$review')");
if($query){
	echo  "<script>alert('Your review submitted ! ');
				window.location.href='';</script>";
}else{
	echo("Error description: " . mysqli_error($con));
}
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | SS-FOOD</title>
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
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php include('includes/header.php'); ?>
	<section>
		<div class="container">
			<div class="row">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="/ss-food">Home</a></li>
				  <li class="active">Product details</li>
				</ol>
			</div>
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							
							
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="catagory?pid=1">Breakfast Recipes</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="catagory?pid=2">Lunch Recipes</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="catagory?pid=3">Dinner Recipes</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="catagory?pid=4">Dessert Recipes</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="catagory?pid=5">Special Recipes </a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="catagory?pid=6">Soft Drinks</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="catagory?pid=7">Juices</a></h4>
								</div>
							</div>
							
						</div><!--/category-products-->
<?php $rt=mysqli_query($con,"select * from products where category= '1'");
$num=mysqli_num_rows($rt);{
}
?>	
<?php $rt1=mysqli_query($con,"select * from products where category= '2'");
$num1=mysqli_num_rows($rt1);{
}
?>	
<?php $rt2=mysqli_query($con,"select * from products where category= '3'");
$num2=mysqli_num_rows($rt2);{
}
?>	
<?php $rt3=mysqli_query($con,"select * from products where category= '4'");
$num3=mysqli_num_rows($rt3);{
}
?>	
<?php $rt4=mysqli_query($con,"select * from products where category= '6'");
$num4=mysqli_num_rows($rt4);{
}
?>	
<?php $rt5=mysqli_query($con,"select * from products where category= '7'");
$num5=mysqli_num_rows($rt5);{
}
?>	
<?php $rt6=mysqli_query($con,"select * from products where category= '5'");
$num6=mysqli_num_rows($rt6);{
}
?>					
						<div class="brands_products"><!--brands_products-->
							<h2>Recipes</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="catagory?pid=1"> <span class="pull-right">(<?php echo htmlentities($num);?>)</span>Breakfast Recipes</a></li>
									<li><a href="catagory?pid=2"> <span class="pull-right">(<?php echo htmlentities($num1);?>)</span>Lunch Recipes</a></li>
									<li><a href="catagory?pid=3"> <span class="pull-right">(<?php echo htmlentities($num2);?>)</span>Dinner Recipes</a></li>
									<li><a href="catagory?pid=4"> <span class="pull-right">(<?php echo htmlentities($num3);?>)</span>Dessert Recipes</a></li>
									<li><a href="catagory?pid=5"> <span class="pull-right">(<?php echo htmlentities($num6);?>)</span>Special Recipes</a></li>
									<li><a href="catagory?pid=6"> <span class="pull-right">(<?php echo htmlentities($num5);?>)</span>Juices</a></li>
									<li><a href="catagory?pid=7"> <span class="pull-right">(<?php echo htmlentities($num4);?>)</span>Soft Drinks</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
<?php
$ret=mysqli_query($con,"select * from products where id=$pid limit 6;");
while ($row=mysqli_fetch_array($ret)) {
	# code...
	$catagory = $row['category'];


?>				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="images/products/<?php echo htmlentities($row['id']);?>.jpg" alt="" />
								
							</div>

						</div>

						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								<h2><?php echo htmlentities($row['productName']);?></h2>
								
								<p><?php echo htmlentities($row['productDescription']);?></p>
								
								<img src="images/product-details/rating.png" alt="" />
								
										<div class="favorite-button m-t-10">
											<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="product-details.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist">
											    <i class="fa fa-heart"></i>
											</a>
											
											</a>
										</div>
									
								<span>
									<span>RS.<?php echo htmlentities($row['productPrice']);?></span>
									<label>Quantity:</label>
									<input type="text" value="1" />
									<button type="button" onclick="location.href='index.php?page=product&action=add&id=<?php echo $row['id']; ?>'" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b><?php echo " ". htmlentities($row['productAvailability']);?></p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b><?php echo " ". htmlentities($row['productCompany']);?></p> 
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
<?php }?>					
<?php $rt=mysqli_query($con,"select * from productreviews where productId='$pid'");
$num=mysqli_num_rows($rt);
{
}
?>					
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (<?php echo htmlentities($num);?>)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>Unknown</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i><?php echo date("h:i:sa");?></a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i><?php echo date("Y/m/d");?></a></li>
									</ul>
									<p>To review means to look back over something for evaluation or memory. The review of a book or movie often evaluates the work in question based on its strong and weak points, sometimes ending with a recommendation (or a dismissal). ... Before a big test, you might want to review ("brush up on") your notes.
.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="" method="POST">
										<span>
											<input type="text" name="name" placeholder="Your Name"/>
											<input type="email" name="email" placeholder="Email Address"/>
										</span>
										<textarea name=	"review" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<input type="submit" name="reviewsubmit" class="btn btn-default pull-right" value="submit">
											
										
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
<?php
$ret=mysqli_query($con,"select * from products where category='$catagory' limit 3;");
while ($row=mysqli_fetch_array($ret)) {
	# code...


?>								
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="images/home/" alt="" />
													<h2>RS.<?php echo htmlentities($row['productPrice']);?></h2>
													<p><?php echo htmlentities($row['productName']);?></p>
													<button type="button" onclick="location.href='index.php?page=product&action=add&id=<?php echo $row['id']; ?>'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>
<?php }?>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
<?php include('includes/footer.php'); ?>
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>