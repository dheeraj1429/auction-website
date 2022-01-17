<!DOCTYPE html>
<html lang="en">
   <head>
      <?php require_once 'inc/head.php';?>
      <link rel="stylesheet" href="./assests/style/logIn.css" />
   </head>

   <body>
      <!-- Header -->
      <?php require_once 'inc/header.php';?>
      <!-- Header -->

      <!-- Main -->
      <main>
         <!-- Sing Up Component -->
         <section class="SignIn_Div side_padding">
            <div class="container-fluid padding_one">
               <div class="row">
                  <div class="col-lg-12 col-xxl-8">
                     <!-- Sign In Div -->
                     <div class="sign_in_inner_div p-lg-0 p-xxl-3">
                        <!-- Sing In Component content -->
                        <div class="text-center">
                           <h1>HI, THERE</h1>
                           <p class="light_para my-3">You can log in to your account here.</p>
                        </div>
                        <!-- Sing In Component content -->

                        <!-- Sing in and log in buttons -->

                        <!-- Sing in input div -->
                        <div class="mt-4">
                           <div class="sing_in_input_div d-flex align-items-center mb-4">
                              <div class="sing_in_icons_div">
                                 <img src="./assests/icons&images/Layer 2.svg" alt="" />
                              </div>
                              <input type="email" placeholder="Email Address" />
                           </div>

                           <div class="sing_in_input_div d-flex align-items-center">
                              <div class="sing_in_icons_div">
                                 <i class="fas fa-lock"></i>
                              </div>
                              <input type="email" placeholder="Password" />
                           </div>

                           <!-- Forget Password -->
                           <div class="text-center mt-5 forgot_div">
                              <a href="#">Forgot Password?</a>
                              <div class="mt-4">
                                 <button class="logIn_button">LOG IN</button>
                              </div>
                           </div>
                        </div>

                        <!-- Sing in input div -->
                     </div>
                     <!-- Sign In Div -->
                  </div>

                  <div class="col-lg-12 col-xxl-4 mt-5 mt-xxl-0">
                     <!-- Switch section -->
                     <div class="switch_section text-center py-5 py-xxl-0">
                        <!-- Content -->
                        <h1 class="text-white">NEW HERE?</h1>
                        <p class="text-white mb-4">Sign up and create your Account</p>
                        <div>
                           <a class="logIn_button" href="./register.html">SIGN UP</a>
                        </div>
                        <!-- Content -->
                     </div>
                     <!-- Switch section -->
                  </div>
               </div>
            </div>
         </section>
         <!-- Sing Up Component -->
      </main>
      <!-- Main -->
      <!-- second_footer -->
      <!-- Footer -->
      <?php require_once 'inc/footer.php';?>
      <!-- Footer -->
      <!-- jquery -->
      <?php require_once 'inc/js.php';?>
   </body>
</html>
