<?php require_once 'inc/config.php';
$pageName = "Winner";
$dataquery = mysqli_query($conn, "SELECT * FROM " . $tblPrefix . "winnig");
$topWining = mysqli_query($conn, "SELECT * FROM bnmi_bid LEFT JOIN bnmi_users ON bnmi_bid.email = bnmi_users.email ORDER BY bnmi_bid.amount DESC LIMIT 3;");

// $img = mysqli_query($conn, "SELECT * FROM " . $tblPrefix ."users Where ");

$img = mysqli_query($conn, "SELECT * FROM " . $tblPrefix ."users`");



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'inc/head.php'; ?>
  <link rel="stylesheet" href="./assests/style/auctionpage.css" />
  <link rel="stylesheet" href="./assests/style/winningPage.css" />
</head>

<body>
  <!-- Header -->
  <?php require_once 'inc/header.php'; ?>
  <!-- Header -->

  <main>
    <!-- winning> -->
    <section class="winner_section side_padding">
      <div class="container-fluid padding_one">

        <!-- Auction win heading -->
        <div class="row">
          <div class="col-12">
            <h1 class="fw-bold text-center">AUCTION LIST</h1>
            <h5 class="text-center light_para my-3">
              <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, vitae! -->
            </h5>
          </div>
        </div>
        <!-- Auction win heading -->

        <!-- Auction win cards section -->
        <div class="row pt-5 pb-3 justify-content-center">

          <div class="col-12 col-sm-10 col-md-10 col-lg-5 col-xxl-3 mb-5 mb-lg-0">
            <!-- auction win card -->
            <div class="AuctionWinner_Card_div">
              <!-- Acution winning inner card -->
              <div class="Auction_Winner_inner_card text-center">
                <h3 class="mt-2">GRAND AUCTION WINNER</h3>

                <div class="User_Winner py-3 mt-3 mb-2">
                  <!-- all winner users -->
<?php
while ($img = mysqli_fetch_array($topWining)){

  echo   ' <div class="User_Winner_Div second_winner">
  <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="" class="img-fluid">

  <!-- user content -->
  <div class="user_Price_Contnet">
    <p>@Player Second</p>
    <h3>$908</h3>
  </div>
  <!-- user content -->

</div>';
}
              
               ?>
                
                  <!-- all winner users -->
                </div>

                <!-- <div class="Winner_Time py-2 mt-5 mb-2"></div> -->

              </div>
              <!-- Acution winning inner card -->
              <div class="auctionCard_Content py-3">
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">70%</div>
                </div>
                <!-- All Card -->

                <?php
                $i = 1;
                while ($winres = mysqli_fetch_assoc($topWining)) {

                  echo '<div class="allCard_div my-3">
                   <div class="row  gx-0">
                     <div class="col-12 col-sm-12 col-md-2 d-flex justify-content-center align-items-center">
                       <p>' . $i . '</p>
                     </div>
                     <div class="col-12 col-sm-12 col-md-2 d-flex justify-content-center my-2 my-md-0">
                       <div class="uerWinner_icons">
                         <i class="fas fa-user"></i>
                       </div>
                     </div>
                     <div class="col-12 col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                       <p>' . $winres['userdata'] . '</p>
                     </div>
                     <div
                       class="col-12 col-sm-12 col-md-2 d-flex justify-content-center align-items-center my-2 my-md-0">
                       <p>$' . $winres['amount'] . '</p>
                     </div>
                   </div>
                 </div>';
                  $i++;
                }

                ?>


                <!-- All Card -->
              </div>

            </div>

            <!-- auction win card -->
          </div>

          <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xxl-9">
            <!-- all auction winner -->
            <div class="row">
              <div class="col-12">
                <div class="auctionList_div_content">
                  <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-center">
                      <h2 class="text-white mb-3 mb-md-0">AUCTION LIST</h2>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-center">
                      <button class="Register_Button">
                        View All
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mt-3">
              <?php
              while ($res = mysqli_fetch_assoc($dataquery)) {
                $email = $res['Winner_email'];
                $img = mysqli_query($conn, "SELECT img FROM " . $tblPrefix . "users WHERE email = '$email'");
                $imgdata = mysqli_fetch_assoc($img);

              ?>
                <div class="col-12 my-4 my-xxl-0 col-xxl-6 mt-5 d-flex justify-content-center">
                  <div class="row user_sub_cards mt-3">
                    <div class="col-12 col-sm-12 col-md-6  d-flex align-items-center justify-content-center justify-content-md-start mb-3 mb-md-0">
                      <div class="user_sub_img ">
                        <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80" alt="" class="img-fluid">
                      </div>
                      <div class="user_sub_card ms-4 ">
                        <h1><?php echo $res['winner_name'] ?></h1>
                        <p class="light_para">$<?php echo $res['amount'] ?></p>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end ">
                      <button class="View_More_Button">View More</button>
                    </div>
                  </div>

                </div> <?php
                      }
                        ?>
              <!-- Auction win cards section -->
            </div>
    </section>
    <!-- winning> -->
  </main>


  <!-- Footer -->

  <?php require_once 'inc/footer.php'; ?>

  <!-- Footer -->

  <?php require_once 'inc/js.php'; ?>

</body>

</html>