<!DOCTYPE html>
<html lang="en">
   <head>
      <?php require_once 'inc/head.php';?>
      <link rel="stylesheet" href="./assests/style/content.css" />
      <link rel="stylesheet" href="./assests/style/howItWorks.css" />

      <!-- Slick Slider CDN -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
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
                           <img src="./assests/icons&images/cons.svg" alt="" />
                        </div>
                        <!-- Contact content -->

                        <!-- Contact inputs -->
                        <div class="contact_input_group_div mt-3">
                           <!-- Inputs -->
                           <div class="contact_page_input_inner mb-3 d-flex">
                              <div class="contact_icons">
                                 <img src="./assests/icons&images/user-solid 1.svg" alt="" />
                              </div>
                              <input type="text" placeholder="Full Name" />
                           </div>
                           <!-- Inputs -->

                           <!-- Inputs -->
                           <div class="contact_page_input_inner mb-3 d-flex">
                              <div class="contact_icons">
                                 <img src="./assests/icons&images/mail.svg" alt="" />
                              </div>
                              <input type="email" placeholder="Email Address" />
                           </div>
                           <!-- Inputs -->

                           <!-- Inputs -->
                           <div class="contact_page_input_inner mb-3 d-flex">
                              <div class="contact_icons">
                                 <img src="./assests/icons&images/phone-solid 1.svg" alt="" />
                              </div>
                              <input type="number" placeholder="Phone Number" />
                           </div>
                           <!-- Inputs -->

                           <!-- Inputs -->
                           <div class="contact_page_input_inner text-aria-div mb-3 d-flex">
                              <div class="contact_icons message_icons_div">
                                 <img src="./assests/icons&images/d.svg" alt="" />
                              </div>
                              <textarea class="message_aria" name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                              <!-- <input type="number" placeholder="Phone Number"> -->
                           </div>
                           <!-- Inputs -->

                           <!-- Send Button -->
                           <button class="send_Button mt-3">Send <img src="./assests/icons&images/send.svg" alt="" /></button>
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
         <?php require_once 'inc/newsetter.php';?>
         <!-- News Letter Section -->
      </main>
      <!-- Main -->

      <!-- Footer -->
      <?php require_once 'inc/fotter.php';?>
      <!-- Footer -->
   </body>
</html>
