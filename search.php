<?php 
session_start();
error_reporting(0);
include('includes/config.php');
$text = $_GET['search'];
echo $text;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Search | SS-FOOD</title>
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
    <link rel="shortcut icon" href="images/icon/tittle.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<?php include('includes/header.php'); ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="/ss-food">Home</a></li>
				  <li class="active">Search</li>
				  <li class="active"><?php echo $text;?></li>
				</ol>
			</div><!--/breadcrums-->
			<div class="register-req">
				<form action="" Method="POST">
					What do you want ?
					<input type="text" name="search" Placeholder="">
					<input type="submit" name="submit" value="Search" >
				</form>
			</div><!--/register-req-->
			
<?php
if(isset($_POST['submit'])){
   $search=$_POST['search'];
}
$query=mysqli_query($con,"select * from products where productName like '%$search%' limit 6");
while($row=mysqli_fetch_array($query))
{

if($row > 0){
	
?>
			<div class="register-req">
				<p><?php echo "Product Name : ". htmlentities($row['productName'])?> </p> 
				<p><?php echo "Product Description : ". htmlentities($row['productDescription'])?> </p> 
				<p><?php echo "Product Price : ". htmlentities($row['productPrice'])?> </p> 
				<p><?php echo "Product Availability : ". htmlentities($row['productAvailability'])?> </p> 
				
				<a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
															

			</div><!--/register-req-->
<?php }else{ echo "No results found"; } ?>
<?php }?>
		</div>
	</section><!--/#do_action-->
		</form>
<?php include('includes/footer.php'); ?>
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>