<?php
require('connection.inc.php');
require('functions.inc.php');
$msg="";
if(isset($_POST['submit'])){
	$name=get_safe_value($con,$_POST['name']);
	$mobile=get_safe_value($con,$_POST['mobile']);
	$email=get_safe_value($con,$_POST['email']);
	$password=get_safe_value($con,$_POST['password']);
  $sql="select * from seller where email='$email' and name='$name'";
  $res=mysqli_query($con,$sql);
  $count=mysqli_num_rows($res);
  if($count>0){
	  $msg="Seller already exist";
  }else{
	  $sql1="insert into seller(name,email,phone) values('$name','$email','$mobile')";
	  mysqli_query($con,$sql1);
	  $row=mysqli_fetch_assoc($res);
	  $sel_id=$row['id'];
	  $sql2="insert into login(id,username,password) values('$sel_id','$email','$password')";
	  mysqli_query($con,$sql2);
	  header('location:enterstore.php');
	  
  }

}

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
if($type=='update'){
		$id=get_safe_value($con,$_GET['id']);
		$update_sql="update seller set name='$name',email='$email',phone='$mobile' where id='$id'";
		mysqli_query($con,$delete_sql);
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
                        <div class="card-header"><strong>ADMIN/SELLER REGISTRATION FORM</strong><small></small></div>
                        <form method="post" enctype="multipart/form-data">
							<div class="card-body card-block">
							   
								<div class="form-group">
									<label for="categories" class=" form-control-label">Seller Name</label>
									<input type="text" name="name" placeholder="Enter seller name" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Email</label>
									<input type="text" name="email" placeholder="Enter Email" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="categories" class=" form-control-label">Phone Number</label>
									<input type="number" name="mobile" placeholder="Enter Phone Number" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password" required>
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