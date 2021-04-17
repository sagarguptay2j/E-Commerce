<?php
require('top.php');
$msg='';
if(isset($_POST['submit'])){
	$email=get_safe_value($con,$_POST['email']);
	$password=get_safe_value($con,$_POST['password']);
    $sql="select * from users where email='$email' and password='$password'";
   
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$row=mysqli_fetch_assoc($res);
		$_SESSION['USER_LOGIN']='yes';
        $_SESSION['USER_EMAIL']=$email;
        $_SESSION['USER_ID']=$row['id'];
		?>
    <script>
    window.location.href='index.php';
    </script>
    <?php
	}else{
		$msg="Please enter correct login details";	
	}
	
}


?>
 <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                
				
   <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Login</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form   method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="email" placeholder="Your Email*" style="width:100%">
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="password" placeholder="Your Password*" style="width:100%">
										</div>
									</div>
									
									<div class="contact-btn">
										<button type="submit" name="submit" class="fv-btn">Login</button>
									</div>
								</form>
								<div class="form-output">
									<p class="form-messege"><?php echo $msg?></p>
								</div>
							</div>
						</div> 
                
				</div>
    </div>
    </section>
      
<?php
require('footer.php');
?>
     