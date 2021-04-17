<?php
require('top.php');
$cat_id=mysqli_real_escape_string($con,$_GET['id']);
if($cat_id >0){
$getproduct=get_product($con,'',$cat_id,'');
}else{
    ?>
    <script>
    window.location.href='index.php';
    </script>
    <?php
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
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <?php if(count($getproduct) >0){ ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                    <select class="ht__select">
                                        <option>Default softing</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by average rating</option>
                                        <option>Sort by newness</option>
                                    </select>
                                </div>
                                
                                <!-- Start List And Grid View -->
                                <ul class="view__mode" role="tablist">
                                    <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                    <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                </ul>
                                <!-- End List And Grid View -->
                            </div>
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                         <!-- Start Single Category -->
                            <?php
                            
                            foreach($getproduct as $list){
                            ?>
                            
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                        <a href="product.php?id=<?php echo $list['id']?>">
                                            <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                                        </a>
                                    </div>
                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                            <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                            <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="fr__product__inner">
                                        <h4><a href="product-details.html"><?php echo $list['name'] ?></a></h4>
                                        <ul class="fr__pro__prize">
                                            <li class="old__prize"><?php echo $list['mrp'] ?></li>
                                            <li><?php echo $list['qty'] ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <!-- End Single Category -->
                                       
                                    </div>
                                    <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                        <div class="col-xs-12">
                                            <div class="ht__list__wrap">
                                                <!-- Start List Product -->
                                                <?php
                            
                            foreach($getproduct as $list){
                            ?>
                            
                                                <div class="ht__list__product">
                                                    <div class="ht__list__thumb">
                                                    <a href="product.php?id=<?php echo $list['id']?>">
                                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
                                                    </a>
                                                    </div>
                                                    <div class="htc__list__details">
                                                        <h2><a href="product-details.html"><?php echo $list['name'] ?></a></h2>
                                                        <ul  class="pro__prize">
                                                            <li class="old__prize">MRP<?php echo $list['mrp'] ?></li> <br> <br>
                                                           <li class="old__prize">  <b> Quantity:<b><?php echo $list['qty'] ?></li>
                                                            <li class="old__prize">PRICE:<?php echo $list['price'] ?></li>
                                                        </ul>

                                                        
                                                        <p><?php echo $list['short_desc'] ?></p>
                                                        <div class="sin__desc">
                                        <p><span>Select Quantity:</span> 
                                        <select>
                                        <option>1</option> 
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                        </select>
                                        </p>
                                    </div>
                                                        <div class="fr__list__btn">
                                                            <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                            }
                            ?>
                                                <!-- End List Product -->
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product View -->
                        </div>
                        
                    </div>
                    <?php
                    }else {
                        echo "Poduct you want not available.";
                    }?>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
      
<?php
require('footer.php');
?>
     