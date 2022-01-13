<?php
   require_once 'inc/config.php';
   $pageName="How it Works";
   $howitWorks = mysqli_query($conn,"SELECT `type`, `title`, `img`, `desc` FROM `".$tblPrefix."cms_pages` WHERE type = 2 and status > 1");

?>
<!DOCTYPE html>
<html lang="en">
   <head>

   <?php require_once 'inc/head.php';?>

      <link rel="stylesheet" href="./assets/style/howItWorks.css" />
   </head>

   <body>
      <!-- Header -->
      <?php require_once 'inc/header.php';?>
      <!-- Header -->

      <!-- Main -->
      <main>
         <!-- Banner section -->
         <section class="Banner_Section_div">
            <h1 class="text-white banner_heading">HOW IT <span>WORKS?</span></h1>
         </section>
         <!-- Banner section -->

         <!-- How to works section -->
         <section class="register_and_account_div padding_Two">
            <div class="container">
               <?php
                  $i=00;
                  while($dataHit = mysqli_fetch_assoc($howitWorks)){
                     $i++;
               ?>
               <div class="row mb-4 mb-lg-4 mb-xl-0 justify-content-evenly <?php if($i%2 == 0){echo 'flex-row-reverse';}?>">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-5">
                     <img src="./assets/img/<?php echo $dataHit['img'];?>" alt="<?php echo $dataHit['title'];?>" class="img-fluid howItWorks_image" />
                  </div>
                  <div class="col-1 d-none d-xl-block">
                     <div class="number_circle"><?php echo $i;?></div>

                     <div class="dot_container mt-3">
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                     </div>
                     
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 col-lg-5 my-auto">
                     <div class="How_it_works_content">
                        <h3 class="howitworks_heading mt-4 mt-md-0 mb-1 p-0"><?php echo $dataHit['title'];?></h3>
                        <p class="howitworks_para">
                           <!-- First of all you must register on our website www.Smartauction.com by creating your personal account. Then you must choose
                           the auction room of the desired product. As soon as the product has been chosen, you must register for the corresponding
                           room by paying the participation fees. -->
                           <?php echo $dataHit['desc'];?>
                        </p>
                     </div>
                  </div>
               </div>
               <?php }?>
               
               <!--<div class="row mb-4 mb-lg-4 mb-xl-0 justify-content-evenly">
                  <div class="col-12 order-2 order-lg-1 col-sm-12 col-md-6 col-lg-5 my-auto">
                     <div class="How_it_works_content">
                        <h3 class="howitworks_heading mt-4 mt-md-0 mb-1 p-0">Log In</h3>
                        <p class="howitworks_para">
                           When the progress bar, showing the filling rate of the auction room, is not 100% full, the auction will not start at the
                           scheduled time and will be automatically postponed for the week of after. Once the auction room is full, a confirmation
                           email will be sent to inform you of the exact date and time of the start of the auction.
                        </p>
                     </div>
                  </div>
                  <div class="col-1 d-none order-2 d-xl-block">
                     <div class="number_circle">02</div>
                     <div class="dot_container mt-3">
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                     </div>
                  </div>
                  <div class="col-12 col-sm-12 order-md-3 order-sm-1 col-md-6 col-lg-5">
                     <img src="./assets/icons&images/Rectangle 1235.png" alt="" class="img-fluid howItWorks_image" />
                  </div>
               </div>
               <div class="row mb-4 mb-lg-4 mb-xl-0 justify-content-evenly">
                  <div class="col-12 order-2 order-lg-1 col-sm-12 col-md-6 col-lg-5 my-auto">
                     <div class="How_it_works_content">
                        <h3 class="howitworks_heading mt-4 mt-md-0 mb-1 p-0">Log In</h3>
                        <p class="howitworks_para">
                           When the progress bar, showing the filling rate of the auction room, is not 100% full, the auction will not start at the
                           scheduled time and will be automatically postponed for the week of after. Once the auction room is full, a confirmation
                           email will be sent to inform you of the exact date and time of the start of the auction.
                        </p>
                     </div>
                  </div>
                  <div class="col-1 d-none order-2 d-xl-block">
                     <div class="number_circle">02</div>
                     <div class="dot_container mt-3">
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                     </div>
                  </div>
                  <div class="col-12 col-sm-12 order-md-3 order-sm-1 col-md-6 col-lg-5">
                     <img src="./assets/icons&images/Rectangle 1235.png" alt="" class="img-fluid howItWorks_image" />
                  </div>
               </div>
               <div class="row mb-4 mb-lg-4 mb-xl-0 justify-content-evenly">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-5">
                     <img src="./assets/icons&images/Rectangle 1236.png" alt="" class="img-fluid howItWorks_image" />
                  </div>
                  <div class="col-1 d-none d-xl-block">
                     <div class="number_circle">03</div>
                     <div class="dot_container mt-3">
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                        <span class="doted"></span>
                     </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 col-lg-5 my-auto">
                     <div class="How_it_works_content">
                        <p class="howitworks_heading mt-4 mt-md-0 mb-1 p-0">Participate in the auction</p>
                        <p class="howitworks_para">
                           In short, here are the simplified registration steps: First of all you must register on our website www.Smartauction.com by
                           creating your personal account. Then you must choose the auction room of the desired product. As soon as the product has
                           been chosen, you must register for the corresponding room by paying the participation fees.
                        </p>
                     </div>
                  </div>
               </div>
               <div class="row mb-4 mb-lg-4 mb-xl-0 justify-content-evenly">
                  <div class="col-12 order-2 order-lg-1 col-sm-12 col-md-6 col-lg-5 my-auto">
                     <div class="How_it_works_content">
                        <h3 class="howitworks_heading mt-4 mt-md-0 mb-1 p-0">Win the auction</h3>
                        <p class="howitworks_para">
                           When the progress bar, showing the filling rate of the auction room, is not 100% full, the auction will not start at the
                           scheduled time and will be automatically postponed for the week of after. Once the auction room is full, a confirmation
                           email will be sent to inform you of the exact date and time of the start of the auction.
                        </p>
                     </div>
                  </div>
                  <div class="col-1 d-none order-2 d-xl-block">
                     <div class="number_circle">04</div>
                  </div>
                  <div class="col-12 col-sm-12 order-md-3 order-sm-1 col-md-6 col-lg-5">
                     <img src="./assets/icons&images/Rectangle 1237.png" alt="" class="img-fluid howItWorks_image" />
                  </div>
               </div> -->
               
            </div>
         </section>
         <!-- How to works section -->

         <section class="register_for_free padding_one">
            <div class="container-fluid side_padding">
               <div class="row">
                  <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xxl-9">
                     <!-- Register content div -->
                     <div class="register_inner_div">
                        <h1 class="text-white">Do you have any questions?</h1>
                        <p class="text-white my-3">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
                     </div>
                     <!-- Register content div -->
                  </div>

                  <div class="col-12 col-sm-12 col-md-3 col-lg-3 d-flex align-items-center justify-content-center">
                     <!-- Register content div -->
                     <button class="Register_Button_One">GET IN TOUCH</button>
                  </div>
               </div>
            </div>
         </section>

         <!-- News Letter Section -->

         <section class="news_letter_sectionside_padding main_bg">
            <div class="container-fluid padding_one">
               <div class="row gx-0">
                  <div class="col-12 d-flex align-items-center justify-content-center">
                     <!-- News letter div -->
                     <div class="news_letter_inner_div">
                        <div class="row px-3 align-items-center">
                           <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                              <h1>Receive our newsletter:</h1>
                           </div>
                           <div class="col-12 col-sm-12 col-md-6 col-xl-7 col-xxl-8">
                              <div class="row align-items-center justify-content-center">
                                 <div class="col-12 col-md-8 col-lg-9 my-4 my-md-0">
                                    <div class="input_group_div">
                                       <div class="inner_input d-flex">
                                          <input type="email" placeholder="Enter your Email" />
                                          <div class="news_icons">
                                             <img src="./assets/icons&images/Layer 2.svg" alt="" />
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-4 col-lg-2">
                                    <!-- News letter button -->
                                    <button class="send_button">Send</button>
                                    <!-- News letter button -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- News letter div -->
                  </div>
               </div>
            </div>
         </section>
         <!-- News Letter Section -->
      </main>
      <!-- Main -->

      <!-- Footer -->
      <!-- Footer -->
      <?php require_once 'inc/footer.php';?>

      <!-- Footer -->
      <!-- Footer -->

      <?php require_once 'inc/js.php';?>
   </body>
</html>
