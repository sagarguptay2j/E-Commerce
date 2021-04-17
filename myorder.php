<?php
require('top.php');
?>
   
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.php">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Products</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- wishlist-area start -->
        <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                               <th class="product-add-to-cart"><span class="nobr">ORDER ID</span></th>
                                                <th class="product-name"><span class="nobr">ORDER DATE</span></th>
                                                <th class="product-name"><span class="nobr">ADDRESS</span></th>
                                                <th class="product-name"><span class="nobr">PAYMENT TYPE</span></th>

                                                <th class="product-price"><span class="nobr">PAYEMNT STATUS</span></th>
                                                <th class="product-stock-stauts"><span class="nobr">ORDER STATUS</span></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $uid=$_SESSION['USER_ID'];
                                        $res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str 
                                                                from  `order`,order_status where `order`.user_id='$uid' and order_status.id=`order`.order_status");
                                        while($row=mysqli_fetch_assoc($res)){
                                        ?>
                                            <tr>
                                                <td class="product-add-to-cart"><a href="my_order_detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['id'] ?></a></td>
                                                <td class="product-name"><?php echo $row['added_on'] ?></td>
                                                <td class="product-name">
                                                <?php echo $row['address']?><br/>
                                                <?php echo $row['city']?><br/>
                                                <?php echo $row['pincode']?>
                                                      </td>
                                                <td class="product-name"><?php echo $row['payment_type'] ?></td>
                                                <td class="product-price"><span class="amount"><?php echo $row['payment_status'] ?></span></td>
                                                <td class="product-stock-status"><span class="wishlist-in-stock"><?php echo $row['order_status_str'] ?></span></td>
                                                
                                            </tr>
                                            <?php 
                                              }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="wishlist-share">
                                                        <h4 class="wishlist-share-title">Share on:</h4>
                                                        <div class="social-icon">
                                                            <ul>
                                                                <li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-tumblr"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist-area end -->

      
<?php
require('footer.php');
?>
     