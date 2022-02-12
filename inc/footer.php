<?php 
    if(isset($_POST['newsletter'])){
        $email = mysqli_real_escape_string($conn,ak_secure_string($_POST['newsletterMail']));

        $checkNewsletter = mysqli_query($conn,"SELECT `email` FROM `".$tblPrefix."subscriptions` WHERE `email` = '$email' ");
        if(mysqli_num_rows($checkNewsletter) == 0){
            $subscription = mysqli_query($conn,"INSERT INTO `".$tblPrefix."subscriptions`(`email`, `date_time`, `status`) VALUES ('$email','$cTime',2)");
            if($subscription == true ){
                $_SESSION['toast']['type'] = "success";
                $_SESSION['toast']['msg'] = "Newsletter subscribed successfully";
                header("refresh:0");
                exit();
            }else{
                $_SESSION['toast']['type'] = "error";
                $_SESSION['toast']['msg'] = "Something went wrong, Please try again later";
                header("refresh:0");
                exit();
            }
        }else{
              $_SESSION['toast']['type'] = "warning";
              $_SESSION['toast']['msg'] = "You've already subscribed to the newsletter";
              header("refresh:0");
              exit();
        }
    }
?>
<footer class="footer side_padding">
    <!-- Footer -->
    <div class="container padding_one">
        <div class="row pt-4 justify-content-center">
          <div class="col-12 col-sm-6 col-md-4 col-lg-5">
              <h1 class="text-white my-3"><?php echo getGeneral('footerHeading');?></h1>
              <p class="light_para">
                <?php echo getGeneral('footerContent');?>
              </p>
              <!-- Footer icons -->
          </div>

          <div class="col-12 col-sm-6 col-md-3 col-lg-2 mt-3 mt-md-0">
              <h1 class="text-white my-3">USEFUL LINKS</h1>
              <p class="light_para"><a href="./who-we-are.php">Who are we?</a></p>
              <p class="light_para"><a href="./howItWorks.php">How it works?</a></p>
              <p class="light_para"><a href="./terms-and-conditions.php">Terms and Conditions</a></p>
              <p class="light_para"><a href="./legal.php">Legal</a></p>
          </div>

          <div class="col-12 col-sm-6 col-md-4 col-lg-4 ms-lg-5 ms-md-0">
              <h1 class="text-white my-3">NEWSLETTER</h1>

              <!-- News letter section -->
              <div class="newsLetter_search">
                <form method="POST" class="w-100 d-flex">
                  <input type="search" name="newsletterMail" autocomplete="off" required placeholder="Enter your email" />
                  <button type="submit" class="newlettButton" name="newsletter">SUBSCRIBE</button>
                </form>
              </div>
              <!-- News letter section -->
          </div>
        </div>
    </div>
    <!-- Footer -->

    <!-- Footer Second -->
    <div class="container-fluid footer_second">
        <div class="row">
          <div class="d-flex justify-content-around py-3">
              <p class="light_para">Copyright © <?php echo date("Y");?>. All Rights Reserved.</p>
              <p class="light_para">
                <a href="./terms-and-conditions.php"> Terms of Use </a> and
                <a href="./privacy-policy.php"> Privacy Policy </a>
              </p>
          </div>
        </div>
    </div>
    <!-- Footer Second -->
  </footer>