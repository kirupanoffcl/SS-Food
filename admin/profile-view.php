<?php
session_start();
error_reporting(0);
include("include/config.php");
if(strlen($_SESSION['admin_login'])==0)
	{	
header('location:/ssfood/admin');
}
else{
	if($_GET['pid']){
	$pid = $_GET['pid'];
}else{
	header('location:profile');
}
	if(isset($_POST['Update'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$contactno=$_POST['contactno'];
	
	$shippingAddress=$_POST['shippingAddress'];
	$shippingState=$_POST['shippingState'];
	$shippingCity=$_POST['shippingCity'];
	$shippingPincode=$_POST['shippingPincode'];
	
	$billingAddress=$_POST['billingAddress'];
	$billingState=$_POST['billingState'];
	$billingCity=$_POST['billingCity'];
	$billingPincode=$_POST['billingPincode'];
	
	$log=mysqli_query($con,"update users SET 
	name ='$name',
	email = '$email',
	contactno = '$contactno',
	
	shippingAddress = '$shippingAddress',
	shippingState = '$shippingState',
	shippingCity = '$shippingCity',
	shippingPincode = '$shippingPincode',
	
	billingAddress = '$billingAddress',
	billingState = '$billingState',
	billingCity = '$billingCity',
	billingPincode = '$billingPincode'
	
	WHERE id =$pid");
	if($log){
		echo "<script>alert('User Account has been updated');
			window.location.href='users';</script>";
	}else{
		echo("Error description: " . mysqli_error($con));
	}
	
}

if(isset($_POST['Delete'])){
	$log=mysqli_query($con,"Delete * FROM users id='$pid' ");
	if($log){
		echo "<script>alert('Account has been updated')";
		date_default_timezone_set('Asia/Kolkata');
		$ldate=date( 'd-m-Y h:i:s A', time () );
		echo "You suceesfully logout !".$ldate;
		$log = mysqli_query($con,"UPDATE userlogs  SET logouttime = '$ldate' WHERE userEmail = '".$_SESSION['login']."' ORDER BY id DESC LIMIT 1");
	}
	else{
		echo("Error description: " . mysqli_error($con));
	}
}


?>
<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin | Profile</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
	<link rel="shortcut icon" href="../images/icon/tittle.png">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>
  <body class="h-100">
    <div class="color-switcher animated">
      <h5>Accent Color</h5>
      <ul class="accent-colors">
        <li class="accent-primary active" data-color="primary">
          <i class="material-icons">check</i>
        </li>
        <li class="accent-secondary" data-color="secondary">
          <i class="material-icons">check</i>
        </li>
        <li class="accent-success" data-color="success">
          <i class="material-icons">check</i>
        </li>
        <li class="accent-info" data-color="info">
          <i class="material-icons">check</i>
        </li>
        <li class="accent-warning" data-color="warning">
          <i class="material-icons">check</i>
        </li>
        <li class="accent-danger" data-color="danger">
          <i class="material-icons">check</i>
        </li>
      </ul>
      <div class="close">
        <i class="material-icons">close</i>
      </div>
    </div>
    <div class="color-switcher-toggle animated pulse infinite">
      <i class="material-icons">settings</i>
    </div>
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="dashboard" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1">Admin Dashboard</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
            <div class="input-group input-group-seamless ml-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-search"></i>
                </div>
              </div>
              <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
          </form>
          <div class="nav-wrapper">
            <ul class="nav flex-column">
			  <li class="nav-item">
                <a class="nav-link active" href="profile">
                  <i class="material-icons">person</i>
                  <span>Profile</span>
                </a>
              </li>
			  
			  <li class="nav-item">
                <a class="nav-link " href="orders">
                  <i class="material-icons">table_chart</i>
                  <span>Manage Orders</span>
                </a>
              </li>
			  
			  <li class="nav-item">
                <a class="nav-link " href="users">
                  <i class="material-icons">person</i>
                  <span>User's Profile</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="new-category">
                  <i class="material-icons">view_module</i>
                  <span>New Category</span>
                </a>
              </li>
			  <li class="nav-item">
                <a class="nav-link " href="new-product">
                  <i class="material-icons">view_module</i>
                  <span>New Product</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="products">
                  <i class="material-icons">table_chart</i>
                  <span>Products</span>
                </a>
              </li>
			  <li class="nav-item">
                <a class="nav-link " href="manage-bills">
                  <i class="material-icons">table_chart</i>
                  <span>Manage Bills</span>
                </a>
              </li>
              
              
			  <li class="nav-item">
                <a class="nav-link " href="activity">
                  <i class="material-icons">table_chart</i>
                  <span>Activities</span>
                </a>
              </li>
			  <li class="nav-item">
                <a class="nav-link " href="logout">
                  <i class="material-icons">error</i>
                  <span>Logout</span>
                </a>
              </li>
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                  <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
<?php
$f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
$result = mysqli_query($con,"SELECT * FROM Orders where orderDate Between '$from' and '$to'");
$num_rows1 = mysqli_num_rows($result);
{
?>
              </form>
              <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item border-right dropdown notifications">
                  <a class="nav-link nav-link-icon text-center" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="nav-link-icon__wrapper">
                      <i class="material-icons">&#xE7F4;</i>
                      <span class="badge badge-pill badge-danger"><?php echo htmlentities($num_rows1); ?></span>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
<?php }?>
<?php 
$f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
$query=mysqli_query($con,"select users.name as username,users.email as useremail,users.contactno as usercontact,users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,users.shippingPincode as shippingpincode,products.productName as productname,products.shippingCharge as shippingcharge,orders.quantity as quantity,orders.orderDate as orderdate,products.productPrice as productprice,orders.id as id  from orders join users on  orders.userId=users.id join products on products.id=orders.productId where orders.orderDate Between '$from' and '$to'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>			  
                    <a class="dropdown-item" href="orders-view?oid=<?php echo htmlentities($row['id']);?>">
                      <div class="notification__icon-wrapper">
                        <div class="notification__icon">
                          <i class="material-icons">&#xE6E1;</i>
                        </div>
                      </div>
                      <div class="notification__content">
                        <span class="notification__category"><?php echo htmlentities($row['username']);?></span>
                        <p><?php echo htmlentities($row['productname']);?><br>
                          <span class="text-success text-semibold"><?php echo htmlentities($row['orderdate']);?></span><br> <?php echo "RS." . htmlentities($row['quantity']*$row['productprice']+$row['shippingcharge']) ."00";?></p>
                      </div>
                    </a>
<?php } ?>                    
                    <a class="dropdown-item notification__all text-center" href="orders"> View all Orders </a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="images/avatars/0.jpg" alt="User Avatar">
                    <span class="d-none d-md-inline-block"><?php echo $_SESSION['admin_name']?></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item" href="user-profile-lite.html">
                      <i class="material-icons">&#xE7FD;</i> Profile</a>
                    <a class="dropdown-item" href="activity">
                      <i class="material-icons">vertical_split</i>Activity</a>
                    <a class="dropdown-item" href="manage-bills">
                      <i class="material-icons">note_add</i> Bills</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="logout">
                      <i class="material-icons text-danger">&#xE879;</i> Logout </a>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <!-- / .main-navbar -->
          <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-check mx-2"></i>
            <strong>Success!</strong> Your profile has been updated! </div>
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">User Profile</h3>
              </div>
            </div>
            <!-- End Page Header -->
<?php
$query=mysqli_query($con,"select * from users where id='$pid'");
while($row=mysqli_fetch_array($query))
{?>			
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="images/avatars/0.jpg" alt="User Avatar" width="110"> </div>
                    <h4 class="mb-0"><?php echo htmlentities($row['name']);?></h4>
                    <span class="text-muted d-block mb-2">Member</span>
                    
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                      <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2">Workload</strong>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100" style="width: 74%;">
                            <span class="progress-value">74%</span>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Description</strong>
                      <span>the management of any office, business, or organization; direction. the function of a political state in exercising its governmental duties. the duty or duties of an administrator in exercising the executive functions of the position. the management by an administrator of such duties.</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Account Details</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form action="" Method="POST">
						  
                            <div class="form-group">
                              <label for="feInputAddress">Name</label>
                              <input type="text" class="form-control" name="name" id="feInputAddress" placeholder="1234 Main St" value="<?php echo htmlentities($row['name']);?>"> </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Email</label>
                                <input type="email" class="form-control" id="feEmailAddress" name="email" placeholder="Email" value="<?php echo htmlentities($row['email']);?>"> </div>
                              <div class="form-group col-md-6">
                                <label for="fePassword">Contact Number</label>
                                <input type="text" class="form-control" id="fePassword" name="contactno" placeholder="Password" value="<?php echo htmlentities($row['contactno']);?>"> </div>
                            </div>
                            <div class="form-group">
                              <label for="feInputAddress">Shipping Address</label>
                              <input type="text" class="form-control" id="feInputAddress" name="shippingAddress" placeholder="1234 Main St" value="<?php echo htmlentities($row['shippingAddress']);?>"> </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feInputCity">City</label>
                                <input type="text" class="form-control" id="feInputCity" name="shippingCity" value="<?php echo htmlentities($row['shippingCity']);?>" > </div>
                              <div class="form-group col-md-4">
                                <label for="feInputState">State</label>
                                <select id="feInputState" class="form-control" name="shippingState">
								<option value="<?php echo htmlentities($row['shippingState']);?>" selected><?php echo htmlentities($row['shippingState']);?></option>
								  <option value="Nothern Province">Nothern Province.</option>
                                  <option value="Western Province" >Western Province</option>
								  <option value="Central Province" >Central Province</option>
								  <option value="Southern Province" >Southern Province</option>
								  <option value="Uva Province" >Uva Province</option>
								  <option value="Sabaragamuwa Province" >Sabaragamuwa Province</option>
								  <option value="North Western Province" >North Western Province</option>
								  <option value="North Central Province" >North Central Province</option>
								  <option value="Eastern Province" >Eastern Province</option>
                                </select>
                              </div>
                              <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip" name="shippingPincode" value="<?php echo htmlentities($row['shippingPincode']);?>"> </div>
                            </div>
							<div class="form-group">
                              <label for="feInputAddress">Billing Address</label>
                              <input type="text" class="form-control" id="feInputAddress" name="billingAddress" placeholder="1234 Main St" value="<?php echo htmlentities($row['billingAddress']);?>"> </div>
							<div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feInputCity">City</label>
                                <input type="text" class="form-control" id="feInputCity" name="billingCity" value="<?php echo htmlentities($row['billingCity']);?>"> </div>
                              <div class="form-group col-md-4">
                                <label for="feInputState">State</label>
                                <select id="feInputState" class="form-control" name="billingState">
                                  <option value="<?php echo htmlentities($row['billingState']);?>" selected><?php echo htmlentities($row['billingState']);?></option>
								  <option value="Nothern Province">Nothern Province.</option>
                                  <option value="Western Province" >Western Province</option>
								  <option value="Central Province" >Central Province</option>
								  <option value="Southern Province" >Southern Province</option>
								  <option value="Uva Province" >Uva Province</option>
								  <option value="Sabaragamuwa Province" >Sabaragamuwa Province</option>
								  <option value="North Western Province" >North Western Province</option>
								  <option value="North Central Province" >North Central Province</option>
								  <option value="Eastern Province" >Eastern Province</option>
                                </select>
                              </div>
                              <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip" name="billingPincode" value="<?php echo htmlentities($row['billingPincode']);?>"> </div>
                            </div>
                            
                            <button type="submit" name = "Update" class="btn btn-accent">Update Account</button>
							<button type="submit" name="Delete" class="btn btn-accent">Delete Account</button>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
<?php }?>
            <!-- End Default Light Table -->
          </div>
          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
            </ul>
            <span class="copyright ml-auto my-auto mr-2">Copyright © <script>document.write(new Date().getFullYear())</script>
              <a href="" rel="nofollow">SS-FOOD (Pvt) Ltd</a>
            </span>
          </footer>
        </main>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
  </body>
</html>
<?php }?>