<?php
require('top.php');
if(!isset($_SESSION['cart'])|| count($_SESSION['cart'])==0)
{
    ?>
    <script>
    window.location.href='index.php';
    </script>
    <?php
}?>
<?php
$msg='';
if(isset($_POST['submit'])){
	$email=get_safe_value($con,$_POST['email']);
	$password=get_safe_value($con,$_POST['password']);
    $sql="select * from users where email='$email' and password='$password'";
   
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($res);
	$count=mysqli_num_rows($res);
	if($count>0){
		$_SESSION['USER_LOGIN']='yes';
        $_SESSION['USER_EMAIL']=$email;
        $_SESSION['USER_ID']=$row['id'];
       
		?>
    <script>
    window.location.href=window.location.href;
    </script>
    <?php
	}else{
		$msg="Please enter correct login details";	
	}
	
}
$cart_total=0;
if(isset($_POST['add'])){
  
    $address=get_safe_value($con,$_POST['address']);
    $city=get_safe_value($con,$_POST['city']);
    $pincode=get_safe_value($con,$_POST['pincode']);
    $payment_type=get_safe_value($con,$_POST['payment_type']);
    $user_id=$_SESSION['USER_ID'];
    foreach($_SESSION['cart'] as $key=>$val)
    {     $productArr=get_product($con,'','',$key);
         $sel_id=$productArr['0']['sel_id'];
        $price=$productArr['0']['price'];
        $qty=$val['qty'];
        $cart_total=$cart_total+($qty*$price);
    }
    $totalprice=$cart_total;
    if($payment_type=='COD'){
        $payment_status='success';
    }
    $order_status='1';
    $added_on=date('Y-m-d h:i:s');
     
    mysqli_query($con,"insert into `order`(user_id,sel_id,address,city,pincode,payment_type,total_price,payment_status,order_status,added_on) 
    values('$user_id','$sel_id','$address','$city','$pincode','$payment_type',' $totalprice','$payment_status','$order_status','$added_on')");

    $order_id=mysqli_insert_id($con);
    
    foreach($_SESSION['cart'] as $key=>$val)
    {     $productArr=get_product($con,'','',$key);
        $price=$productArr['0']['price'];
        $qty=$val['qty'];
    
    mysqli_query($con,"insert into  `order_detail`(sel_id,order_id,product_id,qty,price,added_on) 
    values('$sel_id','$order_id','$key','$qty','$price','$added_on')");
    }

    unset($_SESSION['cart']);
    if($payment_type=='PAYU'){

                $MERCHANT_KEY = "gtKFFx"; 
                $SALT = "eCwWELxi";
                $hash_string = '';
                //$PAYU_BASE_URL = "https://secure.payu.in";
                $PAYU_BASE_URL = "https://test.payu.in";
                $action = '';
                $posted = array();
                if(!empty($_POST)) {
                foreach($_POST as $key => $value) {    
                $posted[$key] = $value; 
                }
                }
                $user_d=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id=$user_id"));
                $formError = 0;
                $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
                $posted['txnid']=$txnid;
                $posted['amount']=$totalprice;
                $posted['firstname']=$user_d['name'];
                $posted['email']=$user_d['email'];
                $posted['phone']=$user_d['mobile'];
                $posted['productinfo']="productinfo";
                $posted['key']=$MERCHANT_KEY ;
                $hash = '';
                $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
                if(empty($posted['hash']) && sizeof($posted) > 0) {
                if(
                empty($posted['key'])
                || empty($posted['txnid'])
                || empty($posted['amount'])
                || empty($posted['firstname'])
                || empty($posted['email'])
                || empty($posted['phone'])
                || empty($posted['productinfo'])

                ) {
                $formError = 1;
                } else {    
                $hashVarsSeq = explode('|', $hashSequence);
                foreach($hashVarsSeq as $hash_var) {
                $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                $hash_string .= '|';
                }
                $hash_string .= $SALT;
                $hash = strtolower(hash('sha512', $hash_string));
                $action = $PAYU_BASE_URL . '/_payment';
                }
                } elseif(!empty($posted['hash'])) {
                $hash = $posted['hash'];
                $action = $PAYU_BASE_URL . '/_payment';
                }


                $formHtml ='<form method="post" name="payuForm" id="payuForm" action="'.$action.'"><input type="hidden" name="key" value="'.$MERCHANT_KEY.'" /><input type="hidden" name="hash" value="'.$hash.'"/><input type="hidden" name="txnid" value="'.$posted['txnid'].'" /><input name="amount" type="hidden" value="'.$posted['amount'].'" /><input type="hidden" name="firstname" id="firstname" value="'.$posted['firstname'].'" /><input type="hidden" name="email" id="email" value="'.$posted['email'].'" /><input type="hidden" name="phone" value="'.$posted['phone'].'" />
                <textarea name="productinfo" style="display:none;">'.$posted['productinfo'].'</textarea><input type="hidden" name="surl" value="http://127.0.0.1/php/ecomweb/payment_complete.php" /><input type="hidden" name="furl" value="http://127.0.0.1/php/ecomweb/payment_fail.php"/><input type="submit" style="display:none;"/></form>';
                echo $formHtml;
                echo '<script>document.getElementById("payuForm").submit();</script>';
                }else{
    ?>
  
     
    <script>
    window.location.href='thank_you.php';
    </script>
    <?php
                }
  
}

?>  
  <!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="index.html">Home</a>
                          <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                          <span class="breadcrumb-item active">checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                       
                        <div class="accordion">
                        <?php
                        $accordian_status="accordian_title";
                        if(!isset($_SESSION['USER_LOGIN'])){
                         $accordian_status="accordian_hide";
                        
                        ?>
                            <div class="accordian_title">
                               CHECKOUT METHOD
                            </div>
                            <div class="accordion__body">
                                <div class="accordion__body__form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkout-method__login">
                                                <form  method="post">
                                                    <h5 class="checkout-method__title">Login</h5>
                                                    <div class="single-input">
                                                        <label for="user-email">Email Address</label>
                                                        <input type="text" name="email" placeholder="Your Email*" style="width:100%">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="user-pass">Password</label>
                                                        <input type="password" name="password" placeholder="Your Password*" style="width:100%">
                                                    </div>
                                                    <a class="require" href="login_register.php">dont have an account?</a>
                                                    <div class="dark-btn">
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
                            </div>
                            <?php
                        }
                        ?>
                            <div class="<?php echo $accordian_status ?>">
                                ADDRESS INFORMATION/PAYMENT METHOD
                            </div>
                            <div class="accordion__body">
                                <div class="bilinfo">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                               
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="address" placeholder="Street Address">
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="city" placeholder="City/State">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="pincode" placeholder="Post code/ zip">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                        </div>
                                   
                                </div></br>
                                <div class="paymentinfo">
                                    <div class="single-method">
                                    <input type="radio" name="payment_type" id="cod" value="COD">
                                    <label for="cod">COD</label><br>
                                    <input type="radio" name="payment_type" id="PAYU" value="PAYU">
                                    <label for="PAYU">PAYU</label>
                                    </div>
                                    
                                </div>
                                </br>
                                <div class="dark-btn">
                                <button type="submit" name="add" class="fv-btn">ORDER</button>
                                </div>
                                </form>
                               
                            </div>
                           
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Your Order</h5>
                    <div class="order-details__item">
                    <?php
                    $cart_total=0;
                    foreach($_SESSION['cart'] as $key=>$val)
                    {
                        
                        $productArr=get_product($con,'','',$key);
                        $pname=$productArr['0']['name'];
                        $pmrp=$productArr['0']['mrp'];
                        $price=$productArr['0']['price'];
                        $pimage=$productArr['0']['image'];
                        $qty=$val['qty'];
                        $cart_total=$cart_total+($qty*$price);
                    ?>
                        <div class="single-item">
                            <div class="single-item__thumb">
                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$pimage?>">
                            </div>
                            <div class="single-item__content">
                                <a href="#"><?php echo $pname?></a>
                                <span class="price"><?php echo $qty*$price?></span>
                            </div>
                            <div class="single-item__remove">
                                <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="zmdi zmdi-delete"></i></a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    </div>
                    
                    <div class="ordre-details__total">
                        <h5>Order total</h5>
                        <span class="price"><?php echo $cart_total?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->
<?php
require('footer.php');
?>
     