<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bs-bg="assets/img/bg/14.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title"><?php echo $location->name; ?></h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="#"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Overview</a></li>
                            <li><?php echo $location->about; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- PRODUCT DETAILS AREA START -->
<div class="ltn__product-area ltn__product-gutter mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__shop-options">
                    <ul>
                        <li>
                            <div class="showing-product-number text-right">
                                <span><?php echo $total_records; ?> Properties</span>
                            </div>
                        </li>
                        <li>
                            <div class="ltn__grid-list-tab-menu ">
                                <div class="nav">
                                    <a class="active show" data-bs-toggle="tab" href="#liton_product_grid"><i class="fas fa-th-large"></i></a>
                                    <a data-bs-toggle="tab" href="#liton_product_list"><i class="fas fa-list"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_product_grid">
                        <div class="ltn__product-tab-content-inner ltn__product-grid-view">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- Search Widget 
                                    <div class="ltn__search-widget mb-30">
                                        <form action="#">
                                            <input type="text" name="search" placeholder="Search your keyword...">
                                            <button type="submit"><i class="fas fa-search"></i></button>
                                        </form>
                                    </div>-->
                                </div>
                                <!-- ltn__product-item -->

                                <?php 
                                if ( count($property) > 0) { ?>

                                <?php
                                foreach ($property as $y) { ?>

                                    <div class="col-lg-4 col-sm-6 col-12">
                                        <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5 text-center---">
                                            <div class="product-img">

                                                <?php 
                                                    $image_names_arr = explode(',', $y->featured_image);
                                                    $image = base_url('assets/uploads/properties/'.$image_names_arr[0]);
                                                        echo ' <a href="'.base_url('home/property_details/' . $y->id).'"><img src="'.$image.'" alt="#"></a>';
                                                ?>
                                                
                                            </div>
                                            <div class="product-info">
                                                <div class="product-badge">
                                                    <ul>
                                                        <?php 
                                                            if ($y->availability == 'true') {
                                                            echo '<li class="sale-badg" style="color: green !important;">Available</li>';
                                                            } else {
                                                                echo '<li class="sale-badg" style="color: red !important;">Sold</li>';
                                                            }
                                                        ?>
                                                    </ul>
                                                </div>
                                                <h2 class="product-title"><a href="<?php echo base_url('home/property_details/' . $y->id); ?>"><?php echo $y->title; ?></a></h2>
                                                <div class="product-img-location">
                                                    <ul>
                                                        <li>
                                                            <a href="locations.html"><i class="flaticon-pin"></i> <?php echo $y->address; ?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                    <?php 
                                                    $amenities = explode(',', $y->amenities);
                                                    foreach ($amenities as $a){
                                                        echo '<li><i class="fa fa-check-circle" style="color: #c5ab18 !important;"></i> '.$a.'</li>';
                                                    }
                                                    ?>
                                                </ul>
                                                <div class="product-hover-action">
                                                    <ul>
                                                        <li>
                                                            <a href="<?php echo base_url('home/property_details/' . $y->id); ?>" title="Product Details">
                                                                <i class="flaticon-right-arrow"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info-bottom">
                                                <div class="product-price">
                                                    <span>₦<?php echo number_format($y->price); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php } //endforeach } ?>

                                    <?php } else { ?>

                                    <h3 class="text-danger">No Property to show.</h3>

                                <?php } ?>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="liton_product_list">
                        <div class="ltn__product-tab-content-inner ltn__product-list-view">
                            <div class="row">
                                <!-- ltn__product-item -->
                                
                                <?php 
                                if ( count($property) > 0) { ?>

                                <?php
                                foreach ($property as $y) { ?>

                                <div class="col-lg-12">
                                    <div class="ltn__product-item ltn__product-item-4 ltn__product-item-5">
                                        <div class="product-img">
                                            <?php 
                                                $image_names_arr = explode(',', $y->featured_image);
                                                $image = base_url('assets/uploads/properties/'.$image_names_arr[0]);
                                                    echo ' <a href="'.base_url('home/property_details/' . $y->id).'"><img src="'.$image.'" alt="#"></a>';
                                            ?>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-badge-price">
                                                <div class="product-badge">
                                                    <ul>
                                                        <?php 
                                                            if ($y->availability == 'true') {
                                                            echo '<li class="sale-badg" style="color: green !important;">Available</li>';
                                                            } else {
                                                                echo '<li class="sale-badg" style="color: red !important;">Sold</li>';
                                                            }
                                                        ?>
                                                    </ul>
                                                </div>
                                                <div class="product-price">
                                                    <span>₦<?php echo number_format($y->price); ?></span>
                                                </div>
                                            </div>
                                            <h2 class="product-title"><a href="<?php echo base_url('home/property_details/' . $y->id); ?>"><?php echo $y->title; ?></a></h2>
                                            <div class="product-img-location">
                                                <ul>
                                                    <li>
                                                        <a href="locations.html"><i class="flaticon-pin"></i> <?php echo $y->address; ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <ul class="ltn__list-item-2--- ltn__list-item-2-before--- ltn__plot-brief">
                                                <?php 
                                                    $amenities = explode(',', $y->amenities);
                                                    foreach ($amenities as $a){
                                                        echo '<li><i class="fa fa-check-circle" style="color: #c5ab18 !important;"></i> '.$a.'</li>';
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="product-info-bottom">
                                            <div class="product-hover-action">
                                                <ul>
                                                    <li>
                                                        <a href="<?php echo base_url('home/property_details/' . $y->id); ?>" title="Product Details">
                                                                <i class="flaticon-right-arrow"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php } //endforeach } ?>

                                    <?php } else { ?>

                                    <h3 class="text-danger">No Property to show.</h3>

                                <?php } ?>

                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ltn__pagination-area text-center">
                    <div class="ltn__pagination">
                        <ul>
                            <li><?php echo pagination_links($links, 'active'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT DETAILS AREA END -->