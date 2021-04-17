<?php
require('top.inc.php');




$email=$_SESSION['ADMIN_USERNAME'];

$sql="select * from seller where email='$email'";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">USER DETAILS</h4>

				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							   <th class="serial">#</th>
							   <th>YOUR ID</th>
							   <th>YOUR NAME</th>
							   <th>YOUR EMAIL</th>
							   <th>YOUR MOBILE</th>
							   <th></th>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i?></td>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['name']?></td>
							   <td><?php echo $row['email']?></td>
							   <td><?php echo $row['phone']?></td>
							  
							 
							   
							</tr>
							<?php } ?>
						 </tbody>
					  </table>
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