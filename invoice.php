<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0){   
header('location:login.php');
}
else{
$query2=mysqli_query($con,"select bill_no,orderDate from orders where ORDER BY bill_no DESC limit 1");
while($row1=mysqli_fetch_array($query2)){
}
	
$query=mysqli_query($con,"select products.productName as pname,products.category as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id 
where bill_no='".$row['bill_no']."' and orders.userId='".$_SESSION['id']."' and orders.paymentMethod is not null");
$cnt=1;
$total_amount=0;
while($row1=mysqli_fetch_array($query))
{
}

$query=mysqli_query($con,"select products.productName as pname,products.category as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id 
where bill_no='".$row['bill_no']."' and orders.userId='".$_SESSION['id']."' and orders.paymentMethod is not null");
$cnt=1;
$total_amount=0;
while($row=mysqli_fetch_array($query))
{
}

?>
<?php 
$query123=mysqli_query($con,"select * from users where id ='".$_SESSION['id']."' ");
while($row123=mysqli_fetch_array($query123)){
$address = $row123['shippingAddress'];
$name = $row123['name'];
$date = $row123['regDate'];
$updationDate = $row123['updationDate'];
$email = $row123['email'];

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice | SS-FOOD</title>
    <link rel="stylesheet" href="css/style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="images/Invoice/logo.png">
      </div>
      <h1>BDCS176<?php echo $_SESSION['bill_no'];?></h1>
      <div id="company" class="clearfix">
        <div>E-Shopper (pvt) Ltd</div>
        <div>No:31, Kovil St, Nallur, <br /> Jaffna, Sri Lanka</div>
        <div>0777123456</div>
        <div><a href="mailto:Eshopper@company.com">Eshopper@company.com</a></div>
      </div>
      <div id="project">
        <div><span>CLIENT</span> <?php echo $_SESSION['username'];?></div>
        <div><span>ADDRESS</span><?php echo $address;?> </div>
        <div><span>EMAIL</span> <a href="<?php echo $email;?>"><?php echo $email;?></a></div>
        <div><span>DATE</span> <?php echo $date;?></div>
        <div><span>DUE DATE</span> <?php echo $date;?></div>
      </div>
    </header>
    <main>

      <table>
        <thead>
          <tr>
            <th class="service">Items Num</th>
            <th class="desc">Product Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
			<th>Shipping Charge</th>
			<th>Service Tax</th>
            <th>TOTAL</th>
          </tr>
        </thead>
		<?php $query2=mysqli_query($con,"select bill_no,orderDate from orders where orders.userId='".$_SESSION['id']."' ORDER BY bill_no DESC limit 1");
while($row=mysqli_fetch_array($query2)){
	$date = $row['orderDate'];
	$billnum = $row['bill_no'];

?>
<?php $query=mysqli_query($con,"select products.productName as pname,products.category as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id 
where bill_no='".$row['bill_no']."' and orders.userId='".$_SESSION['id']."' and orders.paymentMethod is not null");
$cnt=1;
$total_amount=0;
while($row=mysqli_fetch_array($query))
{
?>
        <tbody>
          <tr>
            <td class="service"><?php echo $cnt;?></td>
            <td class="desc"><?php echo $row['pname'];?> </td>
            <td class="unit"><?php echo $qty=$row['qty']; ?> </td>
            <td class="qty">Rs <?php echo $price=$row['pprice']; ?>.00  </td>
            <td class="total">Rs <?php echo $shippcharge=$row['shippingcharge']; ?>.00</td>
			<td class="total">Rs 30.00</td>
			<td class="total">Rs <?php echo (($qty*$price)+$shippcharge+30);?>.00</td>
          </tr>
          <tr>
		  <?php }}?>
            <td colspan="6" class="grand total">GRAND TOTAL</td>
            <td class="grand total">RS.<?php echo $total_amount=$total_amount+(($qty*$price)+$shippcharge+30);?>.00</td>
          </tr>
        </tbody>
      </table>
	  
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>
<?php }?>
