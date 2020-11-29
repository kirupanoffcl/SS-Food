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
if(isset($_POST['remove_code'])){

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
			
				unset($_SESSION['cart'][$key]);
		}
			echo "<script>alert('Your Cart has been Updated');</script>";
	}
}
// code for insert product in order table
$query=mysqli_query($con,"SELECT bill_no FROM orders ORDER BY bill_no DESC limit 1");
while($row=mysqli_fetch_array($query))
{
	$bill = $row['bill_no'];
}
$bill = $bill+1;


if(isset($_POST['ordersubmit'])) {
	
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{

	$quantity=$_POST['quantity'];
	$pdd=$_SESSION['pid'];
	$value=array_combine($pdd,$quantity);


		foreach($value as $qty=> $val34){



mysqli_query($con,"insert into orders(bill_no,userId,productId,quantity,paymentMethod) values('$bill','".$_SESSION['id']."','$qty','$val34','COD')");
unset($_SESSION['cart']);
header('location:bill-details');
}
}
}



// code for Shipping address updation
	if(isset($_POST['UpdateBillAddress'])){
		$badd=$_POST['baddress'];
		$bstate=$_POST['bilingstate'];
		$bcity=$_POST['billingcity'];
		$bpincode=$_POST['billingpincode'];
		
		$query=mysqli_query($con,"update users set billingAddress='$badd',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode'
		where id='".$_SESSION['id']."'");
		if($query){
			echo "<script>alert('Shipping Address has been updated');
			window.location.href='checkout';</script>";
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
    <title>Checkout | SS-FOOD</title>
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
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{

?>
			<div class="checkout-options">
				<h3><?php echo "Hey " . $row['name'];?></h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox" checked onclick="return false;"/> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox" onclick="return false;"/> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p> <b>*</b> symbols says , you can't change details.</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" placeholder="Display Name*" value="<?php echo $row['name']." *";?>" readonly>
								<input type="text" placeholder="Email*" value="<?php echo $row['email']." *";?>" readonly>
								
							</form>
							
						</div>
					</div>
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill to </p>
							<div class="form-one">
								<form>
									<input type="text" placeholder="Billing Address" readonly>
									<input type="text" placeholder="Shipping State" readonly>
									<input type="text" placeholder="Shipping City " readonly>
									<input type="text" placeholder="Shipping Pincode " readonly>
								</form>
							</div>
							
							<div class="form-two">
								<form action ="" method ="POST">
									<input type="text" placeholder="Billing State" name="baddress" value="<?php echo $row['billingAddress'];?>">
									<input type="text" placeholder="Billing State" name="bilingstate" value="<?php echo $row['billingState'];?>">
									<input type="text" placeholder="Billing City" name="billingcity" value="<?php echo $row['billingCity'];?>">
									<input type="text" placeholder="Billing Pincode" name="billingpincode" value="<?php echo $row['billingPincode'];?>">
									<input class="btn btn-primary" type="submit" name="UpdateBillAddress" value="Update Bill Address" >
									
								</form>
							</div>
						</div> 
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Shipping Order</p>
							<textarea name="message"  placeholder="<?php echo $row['shippingAddress']."\r\n".$row['shippingState']."\r\n".$row['shippingCity']."\r\n".$row['shippingPincode']."\r\n";?>" rows="16" ></textarea>
							<label><input type="checkbox" checked onclick="return false;"/> Shipping to bill address</label>
						</div>	
					</div>					
				</div>
			</div>
<?php } ?> <!-- -->
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Remove</td>
							<td>Remove</td>
						</tr>
					</thead>
					<tbody>
<form name="cart" method="post">	
<?php
if(!empty($_SESSION['cart'])){
	?>
		
			<thead>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
							<input class="btn btn-default check_out" type="submit" name="ordersubmit" value ="Confirm Order">							
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody>
 <?php
 $pdtid=array();
    $sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
			$query = mysqli_query($con,$sql);
			$totalprice=0;
			$totalqunty=0;
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				$quantity=$_SESSION['cart'][$row['id']]['quantity'];
				$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;

				array_push($pdtid,$row['id']);
//print_r($_SESSION['pid'])=$pdtid;exit;
	?>

				<tr>
					<td class="cart_product">
								<!--<a href=""><img src="images/cart/three.png" alt=""></a>-->
							</td>
					<td class="cart_description">
						<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>" ><?php echo $row['productName'];

$_SESSION['sid']=$pd;
						 ?></a></h4>
						<div class="row">
							<div class="col-sm-4">
								<div class="rating rateit-small"></div>
							</div>
							<div class="col-sm-8">
<?php $rt=mysqli_query($con,"select * from productreviews where productId='$pd'");
$num=mysqli_num_rows($rt);
{
?>
								<div class="reviews">
									( <?php echo htmlentities($num);?> Reviews )
								</div>
								<?php } ?>
							</div>
						</div><!-- /.row -->
						
					</td>
					<td class="cart_price">
								<p><?php echo "Rs"." ".$row['productPrice']; ?>.00</p>
					</td>
					<td class="cart_quantity">
						<div class="cart_quantity_button">
							<a class="cart_quantity_up" href=""> + </a>
							<input class="cart_quantity_input" type="text" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]" size="2">
				            <a class="cart_quantity_down" href=""> - </a>
						</div>
					</td>
					<td class="cart_total">
					<span class="cart-grand-total-price"><?php echo ($_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge']); ?>.00</span>
					</td>
					<td class="cart_delete">
								<a class="cart_quantity_delete" name="remove_code[]"  href=""><i class="fa fa-times"></i></a>
					</td>
										<td class="romove-item"><input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']);?>" /></td>
										
										

				</tr>

			<?php } }
$_SESSION['pid']=$pdtid;
				?>
				<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>RS.<?php echo " ". $totalprice ?>.00</td>
									</tr>
									<tr>
										<td>Services Tax</td>
										<td>RS.<?php echo " ". $servicesTax = 30?>.00</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>RS.<?php echo " ". $totalprice+$servicesTax ?>.00</span></td>
									</tr>
								</table>
							</td>
						</tr>
				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox" checked onclick="return false;"/> Cash On Delivery</label>
					</span>
					<span>
						<label><input type="checkbox" onclick="return false;"/> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox" onclick="return false;"/> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox" onclick="return false;"/> Paypal</label>
					</span>
				</div>
		</div>
<?php } else {
echo "Your shopping Cart is empty";
		?>	
		<thead>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
							<input class="btn btn-default check_out" type="submit" name="ordersubmit" value ="Confirm Order">							
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody>
 <?php
 $pdtid=array();
    $sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
			$query = mysqli_query($con,$sql);
			$totalprice=0;
			$totalqunty=0;
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				$quantity=$_SESSION['cart'][$row['id']]['quantity'];
				$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;

				array_push($pdtid,$row['id']);
//print_r($_SESSION['pid'])=$pdtid;exit;
	?>

				<tr>
					<td class="cart_product">
								<a href=""><img src="images/cart/three.png" alt=""></a>
							</td>
					<td class="cart_description">
						<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>" ><?php echo $row['productName'];

$_SESSION['sid']=$pd;
						 ?></a></h4>
						<div class="row">
							<div class="col-sm-4">
								<div class="rating rateit-small"></div>
							</div>
							<div class="col-sm-8">
<?php $rt=mysqli_query($con,"select * from productreviews where productId='$pd'");
$num=mysqli_num_rows($rt);
{
?>
								<div class="reviews">
									( <?php echo htmlentities($num);?> Reviews )
								</div>
								<?php } ?>
							</div>
						</div><!-- /.row -->
						
					</td>
					<td class="cart_price">
								<p><?php echo "Rs"." ".$row['productPrice']; ?>.00</p>
					</td>
					<td class="cart_quantity">
						<div class="cart_quantity_button">
							<a class="cart_quantity_up" href=""> + </a>
							<input class="cart_quantity_input" type="text" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]" size="2">
				            <a class="cart_quantity_down" href=""> - </a>
						</div>
					</td>
					<td class="cart_total">
					<span class="cart-grand-total-price"><?php echo ($_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge']); ?>.00</span>
					</td>
					<td class="cart_delete">
								<a class="cart_quantity_delete" name="remove_code[]"  href=""><i class="fa fa-times"></i></a>
					</td>
										<td class="romove-item"><input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']);?>" /></td>
										
										

				</tr>

			<?php } }
$_SESSION['pid']=$pdtid;
				?>
				<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td>RS.<?php echo " ". $totalprice ?>.00</td>
									</tr>
									<tr>
										<td>Services Tax</td>
										<td>RS.<?php echo " ". $servicesTax = 30?>.00</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>RS.<?php echo " ". $totalprice+$servicesTax ?>.00</span></td>
									</tr>
								</table>
							</td>
						</tr>
				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox" checked onclick="return false;"/> Cash On Delivery</label>
					</span>
					<span>
						<label><input type="checkbox" onclick="return false;"/> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox" onclick="return false;"/> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox" onclick="return false;"/> Paypal</label>
					</span>
				</div>
		</div>
<?php }?>
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
<?php }?>