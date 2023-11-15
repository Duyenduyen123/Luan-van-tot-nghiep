<div class="" style="margin-top: 64px;"></div>
<!-- <div class="container-fluid" style="background: #fef5ef!important;">
    <div class="jumbotron jumbotron-fluid" style="background: #fef5ef!important;" >
        <div class="container">
            <h1 class="text-center">THERANKME SHOP</h1>
            <p class="text-center"><a class="text-link1" href="index.php?url=Ho=me/index">Home</a> > <a class="text-link1" href="index.php?url=Home/product">Shop</a> > Category</p>
        </div>
    </div>
</div> -->
<div class="container-fluid">
    <div class="container-cover">
        <div class="row">
            <!-- Start Category -->
            <div  class="col-lg-3 col-md-12" style="margin-bottom: 200px">
                <h5>Categories</h5>
                <hr class="separate_category">
                <div class="list_category">
                    <?php
                        if(isset($data['categories'])){
                            foreach($data['categories'] as $category){ ?>
                                <p><a class="text_link" href="index.php?url=Home/category/<?php echo $category->id ?>"><?php echo $category->name ?></a></p>
                    <?php } } ?>


                </div>

                
            </div>
            <!-- End Category -->
            <div class="col-lg-9">
                <h3><?php echo isset($data['category_item'])?$data['category_item']->name:"" ?></h3>
                <h3><?php echo isset($data['message_success'])?$data['message_success']:"" ?></h3>
                <div class="row mt-2">
                    <?php
                        if(isset($data['list_product'])){
                            foreach($data['list_product'] as $product){ ?>
                    <div  class="col-lg-4 my-5 my-5 col-md-6 col-sm-6 product-cover">
                        <div class="product-item">
                            <a href="index.php?url=Home/product_detail/<?php echo $product->id; ?>">
                            <img class="img-pro-primary" src="./public/uploads/<?php echo $product->image[0]; ?>" alt="">
                            </a>
                            <div class="add_to_cart">
                                <span id="<?php echo $product->id; ?>" class="btn_add_one_cart">Xem chi tiết</span>
                                <!-- <span><i class="fa fa-heart"></i></span> -->
                            </div>
                            <div class="product_info">
                                <a href="index.php?url=Home/product_detail/<?php echo $product->id; ?>"><?php echo $product->name ?></a>
                                <!-- <span><?php echo number_format($product->price_unit) ?>vnđ<?php
                                                if($product->price_promotion!=0){ ?>
                                                    -<?php echo number_format($product->price_promotion) ?><?php echo ($product->price_promotion!=0)?"vnđ":"" ?>
                                              <?php } ?>
                                        </span> -->
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
                <?php 
                    if(isset($data['total_page_number'])){ ?>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php 
                                    for($i=1;$i<=$data['total_page_number'];$i++){ ?>
                                <li class="page-item mx-1" ><a class="page-link" <?php if($data['page_index']==$i){ ?> style="background-color: #b19361; color: #fff;" <?php } ?> href="index.php?url=Home/product/page=<?php echo $i ?>"><?php echo $i ?></a></li>
                                <?php }
                                    ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="col"></div>
                    <?php }  ?>
                </div>
            </div>
            <!-- <div class="col-lg-9">
                <h3><?php echo isset($data['category_item'])?$data['category_item']->name:"" ?></h3>
                <div class="row">
                <?php
                    if(isset($data['list_product'])){
                        foreach($data['list_product'] as $product){ ?>
                            <div  class="col-lg-4 my-5  col-md-6 col-sm-6 product-cover" data-aos="fade-up"  data-aos-duration="1000" >
                                <div class="product-item">
                                    <a href="index.php?url=Home/product_detail/<?php echo $product->id; ?>">
                                        <img class="img-pro-primary" src="./public/uploads/<?php echo $product->image[0]; ?>" alt="">
                                    </a>
                                    <div class="add_to_cart">
                                        <span id="<?php echo $product->id; ?>" class="btn_add_one_cart">Add to cart1234</span>
                                        <span ><i class="fa fa-heart"></i></span>
                                    </div>
                                    <div class="product_info">
                                        <a href="index.php?url=Home/product_detail/<?php echo $product->id; ?>">
                                            <?php echo $product->name ?>
                                        </a>
                                        <span><?php echo number_format($product->price_unit) ?>vnđ<?php
                                                if($product->price_promotion!=0){ ?>
                                                    -<?php echo number_format($product->price_promotion) ?><?php echo ($product->price_promotion!=0)?"vnđ":"" ?>
                                              <?php } ?>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        <?php }  } ?>

                </div>
                <div class="row">
                <div class="col"></div>
                <div class="col">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?php 
                                for($i=1;$i<=$data['total_page_number'];$i++){ ?>
                                    <li class="page-item mx-1" ><a class="page-link" <?php if($data['page_index']==$i){ ?> style="background-color: #b19361; color: #fff;" <?php } ?> href="index.php?url=Home/category/page=<?php echo $i ?>"><?php echo $i ?></a></li>
                            <?php }
                            ?>
                        </ul>
                    </nav>
                </div>
                <div class="col"></div>

            </div>
            </div>
        </div> -->
    </div>

</div>


