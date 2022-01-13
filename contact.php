<?php
   require_once 'inc/config.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php require_once 'inc/head.php';?>
      <link rel="stylesheet" href="./assets/style/content.css" />
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
            <h1 class="text-white banner_heading">CONTACT <span>US</span></h1>
         </section>
         <!-- Banner section -->

         <!-- Content us section -->
         <section class="contact_use_section padding_one main_bg">
            <div class="container-fluid side_padding">
               <div class="row gx-0 justify-content-center">
                  <div class="col-12 contact_row col-sm-12 col-md-7 col-lg-7 p-5">
                     <div class="contact_div">
                        <!-- Contact content -->
                        <div class="d-flex justify-content-between">
                           <h3 class="contact_heading">Send us a Message</h3>
                           <img src="./assets/icons&images/cons.svg" alt="" />
                        </div>
                        <!-- Contact content -->

                        <!-- Contact inputs -->
                        <div class="contact_input_group_div mt-3">
                           <!-- Inputs -->
                           <div class="contact_page_input_inner mb-3 d-flex">
                              <div class="contact_icons">
                                 <img src="./assets/icons&images/user-solid 1.svg" alt="" />
                              </div>
                              <input type="text" placeholder="Full Name" />
                           </div>
                           <!-- Inputs -->

                           <!-- Inputs -->
                           <div class="contact_page_input_inner mb-3 d-flex">
                              <div class="contact_icons">
                                 <img src="./assets/icons&images/mail.svg" alt="" />
                              </div>
                              <input type="email" placeholder="Email Address" />
                           </div>
                           <!-- Inputs -->

                           <!-- Inputs -->
                           <div class="contact_page_input_inner mb-3 d-flex">
                              <div class="contact_icons">
                                 <img src="./assets/icons&images/phone-solid 1.svg" alt="" />
                              </div>
                              <input type="number" placeholder="Phone Number" />
                           </div>
                           <!-- Inputs -->

                           <!-- Inputs -->
                           <div class="contact_page_input_inner text-aria-div mb-3 d-flex">
                              <div class="contact_icons message_icons_div">
                                 <img src="./assets/icons&images/d.svg" alt="" />
                              </div>
                              <textarea class="message_aria" name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                              <!-- <input type="number" placeholder="Phone Number"> -->
                           </div>
                           <!-- Inputs -->

                           <!-- Send Button -->
                           <button class="send_Button mt-3">Send <img src="./assets/icons&images/send.svg" alt="" /></button>
                           <!-- Send Button -->
                        </div>
                        <!-- Contact inputs -->
                     </div>
                  </div>
               </div>
            </div>
            <!-- Map section -->
            <div class="container-fluid p-0 map_container">
               <iframe
                  src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d167826.84650539697!2d77.1514821703051!3d28.679377810345667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1641379916794!5m2!1sen!2sin"
                  width="100%"
                  height="450"
                  allowfullscreen=""
                  loading="lazy"
               ></iframe>
            </div>
            <!-- Map section -->
         </section>
         <!-- Content us section -->

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
      <?php require_once 'inc/footer.php';?>

      <?php require_once 'inc/js.php';?>
   </body>
</html>
