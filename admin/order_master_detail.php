<?php
require('top.inc.php');
$order_id=get_safe_value($con,$_GET['id']);
if(isset($_POST['update_order_status'])){
	$update_order_status=$_POST['update_order_status'];
	mysqli_query($con,"update `order` set order_status='$update_order_status' where id=$order_id");
}


?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">ORDERED PRODUCT LIST</h4>

				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
				   <table class="table">
						<thead>
							<tr>
								<th class="product-name"><span class="nobr">NAME</span></th>
								<th class="product-thumbnail"><span class="nobr">IMAGE</span></th>
								<th class="product-name"><span class="nobr">QUANTITY</span></th>

								<th class="product-price"><span class="nobr">PRICE</span></th>
								<th class="product-price"><span class="nobr">TOTAL PRICE</span></th>
								
							</tr>
						</thead>
						<tbody>
						<?php
						$sel_id= $_SESSION['USER_ID'];
						$res=mysqli_query($con,"select distinct(order_detail.id),order_detail.*,product.name,product.image,`order`.address,`order`.city,`order`.pincode,`order`.order_status 
												from order_detail,product,`order` where order_detail.order_id='$order_id' and order_detail.product_id=product.id ");

												
						$total_price=0;
						while($row=mysqli_fetch_assoc($res)){
							$total_price=$total_price+($row['qty']*$row['price']);
							$add=$row['address'];
							$city=$row['city'];
							$pincode=$row['pincode'];
							$order_status=$row['order_status'];
						?>
							<tr>
								
								<td class="product-name"><?php echo $row['name'] ?></td>
								<td class="product-thumbnail"><img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"></td>
								<td class="product-name"><?php echo $row['qty'] ?></td>
								<td class="product-name"><?php echo $row['price'] ?></td>
								<td class="product-name"><?php echo $row['qty']*$row['price'] ?></td>
								
							</tr>
							<?php 
								}
							?>
							<tr>
								
								<td colspan="3"></td>
								<td class="product-name">TOTAL PRICE</td>
								<td class="product-name"><?php echo $total_price ?></td>
								
							</tr>
						</tbody>
					  </table>
					  <div id="order_detail">
						  <strong>ADDRESS</strong>
						  <?php echo $add ?>, <?php echo $city ?>, <?php echo $pincode ?>.<br/><br/>
						  <?php
						  $order_status_val=mysqli_fetch_assoc(mysqli_query($con,"select * from order_status where order_status.id=$order_status "));
						   ?>
						  <strong>STATUS</strong>
						  <?php echo $order_status_val['name'] ?>
						  <div>
						  <br/>
						  <form method="post">
						  <select class="form-control" name="update_order_status">
										<option>Select status</option>
										<?php
										$res=mysqli_query($con,"select * from  order_status ");
										while($row=mysqli_fetch_assoc($res)){
											if($row['id']==$categories_id){
												echo "<option selected value=".$row['id'].">".$row['name']."</option>";
											}else{
												echo "<option value=".$row['id'].">".$row['name']."</option>";
											}
											
										}
										?>
									</select>
									<input type="submit" class="form-control"/>
						  </form>
						  </div>
						
						  
					  </div>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.inc.php');
?>