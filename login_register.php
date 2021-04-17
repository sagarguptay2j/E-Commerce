<?php
require('top.php');
$msg='';

    if(isset($_POST['submit'])){
        $name=get_safe_value($con,$_POST['name']);
        $email=get_safe_value($con,$_POST['email']);
        $password=get_safe_value($con,$_POST['password']);
        $mobile=get_safe_value($con,$_POST['mobile']);
		$csql="select * from users where email='$email'";
		$check=mysqli_num_rows(mysqli_query($con,$csql));
		if($check>0){
			$msg="Enterd email already exist";
		}else{
			$date=date('y-m-d h:i:s');
			$sql="insert into users(name,email,mobile,password,date) values('$name','$email','$mobile','$password','$date')";
			mysqli_query($con,$sql);
			$msg="Thank you for registration now enter login details onlogin page for login..";


		}
			
		
               
	}

?>
   
          <!-- Start Contact Area -->
          <section class="htc__contact__area ptb--100 bg__white">
		  <div class="sufee-login d-flex align-content-center flex-wrap">
            <div class="container">
                
				

					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Register</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form  method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="name" placeholder="Your Name*" style="width:100%"required>
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="email" placeholder="Your Email*" style="width:100%"required>
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="number" name="mobile" placeholder="Your Mobile*" style="width:100%"required>
										</div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="password" placeholder="Your Password*" style="width:100%"required>
										</div>
									</div>
									
									<div class="contact-btn">
										<button type="submit" name="submit"  class="fv-btn">Register</button>
									</div>
								</form>
								<div class="form-output">
									<p class="form-messege"><?php echo $msg?></p>
								</div>
								<a href="login.php">Already have an account?</a>
							</div>
						</div> 
                
				</div>
					
            </div>
			</div>
        </section>
        <!-- End Contact Area -->
<?php
require('footer.php');
?>
     