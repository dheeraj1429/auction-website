<?php
   require_once 'inc/config.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php require_once 'inc/head.php';?>

      <link rel="stylesheet" href="./assets/style/whoWeAre.css" />
      <link rel="stylesheet" href="./assets/style/howItWorks.css" />
   
   </head>
   <body>
      <!-- Header -->
      <?php require_once 'inc/header.php';?>
      <!-- Header -->

      <main>
         <!-- Banner section -->
         <section class="Banner_Section_div">
            <h1 class="text-white banner_heading">WHO ARE <span>WE</span></h1>
         </section>
         <!-- Banner section -->

         <section class="whoWeAre padding_one">
            <div class="container-fluid side_padding">
               <div class="row">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                     <!-- My Account Setting -->
                     <div class="row">
                        <div class="col-12">
                           <div class="hot_it_works_heading py-3">
                              <h1>WHO ARE <span class="span_color_2">WE ?</span></h1>
                              <div class="line_div ms-0 my-4"></div>
                           </div>
                        </div>
                     </div>
                     <!-- My Account Setting -->

                     <h5>Smart Auctions is a shopping platform unlike any other ...</h5>
                     <h5 class="my-3">Smart Auctions is the best way to afford the latest smartphone thanks to an auction… online!</h5>
                     <h5>We offer a large catalog of high-tech products except for one small detail: you set the purchase price!</h5>

                     <p class="light_para mt-3">
                        The free auction system It's very simple: the purchase price of each of the products that we sell on the site is subject to an
                        auction. So you decide how much you want to spend. If the price of the item soars during the auction, you are free to stop
                        there. However, if no other participant outbids your last price proposal, you get the last smartphone at half price for
                        example!
                     </p>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center">
                     <img src="./assets/icons&images/Rectangle 1236.png" alt="" class="img-fluid howItWorks_image" />
                  </div>
               </div>
            </div>
         </section>
      </main>

      <!-- Footer -->
      <?php require_once 'inc/footer.php';?>

      <?php require_once 'inc/js.php';?>

   </body>
</html>
