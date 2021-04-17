<?php
require('connection.inc.php');
require('functions.inc.php');
$msg="";
if(isset($_POST['submit'])){
	$name=get_safe_value($con,$_POST['name']);
	$address=get_safe_value($con,$_POST['address']);

  $sql="select * from store where name='$name' and name='$address'";
  $res=mysqli_query($con,$sql);
  $count=mysqli_num_rows($res);
  if($count>0){
	  $msg="Store name already exist";
  }else{
	  $sql1="insert into store(name,address) values('$name','$address')";
	  mysqli_query($con,$sql1);
	  
	  header('location:login.php');
	  
  }

}





?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>se
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
   <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  <li class="menu-item-has-children dropdown">
                     <a href="login.php" >Have an account</a>
                  </li>
                 
				  
               </ul>
            </div>
         </nav>
      </aside>
     
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" ><img src="images/logo.png" alt="Logo"></a>
                  <a class="navbar-brand hidden" ><img src="images/logo2.png" alt="Logo"></a>
                 
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome Admin</a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Seller Store Information</strong><small></small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   
								<div class="form-group">
									<label for="categories" class=" form-control-label">Store Name</label>
									<input type="text" name="name" placeholder="Enter seller name" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Store address</label>
									<input type="text" name="address" placeholder="Store address" class="form-control" required>
								</div>
								
								
							   <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							   <div class="field_error"><?php echo $msg ?></div>
							</div>
						</form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
<?php
require('footer.inc.php');
?>