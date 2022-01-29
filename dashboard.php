<?php
   require_once 'inc/config.php';
   $pageName="Dashboard";

   if(! isset($_SESSION['user'])){
      $_SESSION['toast']['msg'] = "Please login to continue.";
      header('location:login.php');
      exit();
   }

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php require_once 'inc/head.php';?>
      <link rel="stylesheet" href="./assests/style/blog.css" />
      <link rel="stylesheet" href="./assests/style/MyAccount.css" />
      <link rel="stylesheet" href="./assests/style/howItWorks.css" />
   </head>

   <body>
      <!-- Header -->
      <?php require_once 'inc/header.php';?>
      <!-- Header -->

      <!-- main -->
      <main>
         <!-- Banner section -->
         <section class="Banner_Section_div">
            <h1 class="text-white banner_heading">MY <span>ACCOUNT</span></h1>
         </section>
         <!-- Banner section -->

         <!-- My Account Setting -->
         <section class="MyAccount_Section padding_one">
            <div class="container-fluid side_padding">
               <div class="row pb-5 pt-4">
                  <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                     <!-- My Account Setting -->
                     <div class="row">
                        <div class="col-12">
                           <div class="hot_it_works_heading py-3">
                              <h1>MY ACCOUNT <span class="span_color_2">SETTINGS</span></h1>
                              <div class="line_div ms-0 my-4"></div>
                           </div>
                        </div>
                     </div>
                     <!-- My Account Setting -->

                     <div class="row">
                        <div class="col-12 myAccountOptionNum col-sm-12 col-md-6 col-lg-6">
                           <p>Number of tokens purchased</p>
                           <input type="text" class="NumberInputDis" placeholder="0" disabled />
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-md-6 col-lg-6">
                           <div class="col-12 myAccountOptionNum col-sm-12 mt-4 mt-md-0">
                              <p>Number of vip tokens purchased</p>
                              <input type="text" class="NumberInputDis" placeholder="0" disabled />
                           </div>
                        </div>
                     </div>

                     <div class="row mt-4">
                        <div class="col-12 col-sm-12 col-md-12 col-md-12 col-lg-12 mt-4 mt-md-0">
                           <div class="col-12 myAccountOption col-sm-12">
                              <p>Full Name (*)</p>
                              <input type="text" name="name" autocomplete="off" required value="<?php echo $_SESSION['user']['name'];?>" placeholder="Your name" disabled />
                           </div>
                        </div>
                     </div>

                     <div class="row mt-4">
                        <div class="col-12 col-sm-12 col-md-12 col-md-12 col-lg-12 mt-4 mt-md-0">
                           <div class="col-12 myAccountOption col-sm-12">
                              <p>E-mail (*)</p>
                              <input type="text" name="email" autocomplete="off" required value="<?php echo getUserData('email');?>" placeholder="Your email address" disabled />
                           </div>
                        </div>
                     </div>

                     <div class="row mt-4">
                        <div class="col-12 myAccountOption col-sm-12 col-md-6 col-lg-6">
                           <p>pseudo</p>
                           <input type="text" name="name" autocomplete="off" required value="<?php echo getUserData('name');?>"  placeholder="Your name" disabled />
                        </div>
                        <div class="col-12 myAccountOption col-sm-12 col-md-6 col-lg-6">
                           <p>Telephone number (*)</p>
                           <input type="text" placeholder="Telephone number" disabled />
                        </div>
                     </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-4 col-lg-4"></div>
               </div>
            </div>
         </section>
         <!-- My Account Setting -->
      </main>
      <!-- main -->

      <!-- Footer -->
      <?php require_once 'inc/footer.php';?>
      <?php require_once 'inc/js.php';?>

   </body>
</html>
