
   <!-- Breadcroumb Area -->

   <div class="breadcroumb-area bread-bg-2">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="breadcroumb-title text-center">
                  <h1>Our Gallery</h1>
                  <h6><a href="index.html">Home</a> / Our Gallery</h6>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Portfolio Area-->

   <div class="portfolio-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="section-title">
                  <h6>Our Great Work</h6>
                  <h2>We do <b>social</b> work <br/>for the Youths & Society</h2>
               </div>
            </div>
         </div>

         <?php
         if ( $total_records > 0 ) { ?>

         <div class="row">
            <div class="col-lg-12">
               <div class="portfolio-list">

               <?php
               foreach ($photos as $p) { ?>

                  <div class="single-portfolio-item port-bg-1 illustration">
                     <img class="img-responsive" src="<?php echo base_url('assets/uploads/gallery/'.$p->photo); ?>" alt="">
                     <div class="details">
                        <div class="info">
                           <h5><a href="#"></a></h5>
                           <a href="<?php echo base_url('assets/uploads/gallery/'.$p->photo); ?>"><i class="las la-search-plus"></i></a>
                        </div>
                     </div>
                  </div>

               <?php } //endforeach ?>
                        
               </div>
            </div>
         </div>

         <?php } else { ?>

         <h3 class="text-danger text-center">No gallery photo to show.</h3>

         <?php } //endif ?>

         
         <?php echo pagination_links($links, 'pagination'); ?>
      </div>
   </div>



