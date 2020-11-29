<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0){   
header('location:login.php');
}
else{
if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;

			}
		}
			echo "<script>alert('Your Cart hasbeen Updated');</script>";
		}
	}
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
			
				unset($_SESSION['cart'][$key]);
		}
			echo "<script>alert('Your Cart has been Updated');</script>";
	}
}
// code for insert product in order table


if(isset($_POST['ordersubmit'])) {
	if(strlen($_SESSION['login'])==0){   
		header('location:login.php');
	}else{
		header('location:checkout');
	}
}

// code for billing address updation
	if(isset($_POST['update']))
	{
		$baddress=$_POST['billingaddress'];
		$bstate=$_POST['bilingstate'];
		$bcity=$_POST['billingcity'];
		$bpincode=$_POST['billingpincode'];
		$query=mysqli_query($con,"update users set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Billing Address has been updated');</script>";
		}
	}


// code for Shipping address updation
	if(isset($_POST['shipupdate']))
	{
		$saddress=$_POST['shippingaddress'];
		$sstate=$_POST['shippingstate'];
		$scity=$_POST['shippingcity'];
		$spincode=$_POST['shippingpincode'];
		$query=mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Shipping Address has been updated');</script>";
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
    <title>Bill | SS-FOOD</title>
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
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="/ss-food">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
	<?php 

$query2=mysqli_query($con,"select bill_no,orderDate from orders where orders.userId='".$_SESSION['id']."' ORDER BY bill_no DESC ");
while($row=mysqli_fetch_array($query2)){
	$date = $row['orderDate'];
	$billnum = $row['bill_no'];

?>

<?php $query=mysqli_query($con,"select products.productName as pname,products.category as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id 
where bill_no='".$row['bill_no']."' and orders.userId='".$_SESSION['id']."' and orders.paymentMethod is not null");
$cnt=1;
$total_amount=0;
while($row1=mysqli_fetch_array($query))
{
}
?>
		<table class="table table-bordered">

				<thead>
			
				<tr>
					<th class="cart-romove item">Bill Number :BDCS176<?php echo htmlentities($row['bill_no']);?> </th>
					<?php $_SESSION['bill_no']=$row['bill_no'];?>
					<th class="cart-romove item">SS-FOOD (Pvt) Ltd</th>
					<th colspan="3" class="cart-romove item">No:31, Kovil St, Nallur, Jaffna, Sri Lanka</th>
					<th class="cart-romove item"> <?php echo htmlentities($row['orderDate']);?></th>
					<?php $_SESSION['orderDate']=$row['orderDate'];?>
				</tr>
			
				<tr>
					<th class="cart-romove item">Item Nums</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Unit Price</th>
					<th class="cart-sub-total item">Shipping Charge</th>
					<th class="cart-total item">Grand Total</th>
				</tr>
				
				</thead><!-- /thead -->

<?php $query=mysqli_query($con,"select products.productName as pname,products.category as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id 
where bill_no='".$row['bill_no']."' and orders.userId='".$_SESSION['id']."' and orders.paymentMethod is not null");
$cnt=1;
$total_amount=0;
while($row=mysqli_fetch_array($query))
{
?>

				
			
				<tbody>

				<tr align="center">
				
					<td>
					<h5 class='cart-product-description'>
					<?php echo $cnt;?>
					</h5>
					</td>
					
					<td class="cart-product-name-info">
						<h5 class='cart-product-description'>
						<?php echo $row['pname'];?> 
						</h5>
					</td>
					
					<td class="cart-product-quantity">
					<h5 class='cart-product-description'>
						<?php echo $qty=$row['qty']; ?>   
					</h5>
		            </td>
					
					<td class="cart-product-sub-total">
					<h5 class='cart-product-description'>
					Rs <?php echo $price=$row['pprice']; ?>.00  
					</h5>
					</td>
					
					<td class="cart-product-sub-total"> 
					<h5 class='cart-product-description'>
					Rs <?php echo $shippcharge=$row['shippingcharge']; ?>.00  
					</h5>
					</td>
					
					<td class="cart-product-grand-total">
					<h5 class='cart-product-description'>
					Rs <?php echo (($qty*$price)+$shippcharge);?>.00
					</h5>
					</td>
					
					
				</tr>
				
<?php $cnt=$cnt+1;
$total_amount=$total_amount+(($qty*$price)+$shippcharge);
}
?>

					<tr>
					
					<td colspan="5"> <h4 class='cart-product-description' align="right"> Total Bill Amount </h4> </td>
					<td> <h4 class='cart-product-description' align="center"> Rs <?php echo $total_amount;?>.00 </h4> </td>
					
					</tr>
					
					<tr>
					<td colspan="6"> </td>
					</tr>

<?php 
} 
?>

					

				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
		
	</div>
	<div class="payment-options">
					<span>
						<label><input type="checkbox" checked onclick="return false;"/> Cash On Delivery</label>
					</span>
					<span>
					<?php ?>
						<label><button onclick="document.location='invoice'">In-voice </button></label>
					</span>
				</div>
	<!--/#do_action-->
</section>
<?php include('includes/footer.php'); ?>
	
	
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php }?>