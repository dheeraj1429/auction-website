<?php
require_once 'inc/config.php';
$pageName = "Auction Bets";

if (!isset($_SESSION['user'])) {
  $_SESSION['toast']['msg'] = "Please login to continue.";
  header('location:login.php');
  exit();
}
$productname = "";
if (isset($_GET['id']) && isset($_GET['auction'])) {
  $id = mysqli_real_escape_string($conn, ak_secure_string($_GET['id']));
  $query = mysqli_query($conn, "SELECT * FROM " . $tblPrefix . "auctions WHERE id = $id");
  $bidingAmount =  mysqli_query($conn, "SELECT  userdata, email, MAX(amount) ,auction_id, auction_name FROM " . $tblPrefix . "bid WHERE auction_id = $id ");
  $winassoc = mysqli_fetch_assoc($bidingAmount);
  $userName = $winassoc['userdata'];
  $winamount = $winassoc['MAX(amount)'];
  $auctionid = $winassoc['auction_id'];
  $auctionname = $winassoc['auction_name'];
  $useremail = $winassoc['email'];
  $data = mysqli_fetch_assoc($query);
  $productname = $data['name'];
}
$sql = mysqli_query($conn,"SELECT `id` FROM `".$tblPrefix."auction_participant` WHERE auction_id = '".$_GET['id']."' AND user_id = ".$_SESSION['user']['id']." ");
if(mysqli_num_rows($sql) != 1){
  $_SESSION['toast']['type'] = "error";
  $_SESSION['toast']['msg'] = "You're not in auction.";
  header("location:index.php");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'inc/head.php'; ?>

  <link rel="stylesheet" href="./assests/style/howItWorks.css" />
  <link rel="stylesheet" href="./assests/style/bets.css" />
</head>

<body>
  <!-- Header -->
  <?php require_once 'inc/header.php'; ?>
  <!-- Header -->

  <main>
    <!-- bets section -->
    <section class="bets_section side_padding">
      <div class="container-fluid padding_one">
        <div class="row">
          <div class="col-12">
            <h1>Bids</h1>
            <p class="light_para">Welcome Smart Auction Bids page</p>
          </div>
        </div>

        <div class="row py-3">
          <div class="col-12 col-sm-12 col-md-3 col-lg-3 ">
            <div class="bitCards d-flex align-items-center px-3">
              <!-- icon -->
              <div class="bitCard_icon bg_one">
                <img src="./assests/icons&images/law-auction-svgrepo-com.svg" alt="">
              </div>
              <!-- icon -->
              <!-- content -->
              <div class="bitCard_Contnet">
                <h1 id="timer">24K</h1>

                <p class="light_para">Artwork</p>
              </div>
              <!-- content -->
            </div>
          </div>
          <div class="col-12 col-sm-12 col-md-3 col-lg-3 my-3 my-md-0">
            <div class="bitCards d-flex align-items-center px-3">
              <!-- icon -->
              <div class="bitCard_icon bg_two">
                <img src="./assests/icons&images/auction.png" alt="">
              </div>
              <!-- icon -->
              <!-- content -->
              <div class="bitCard_Contnet">
                <h1>82K</h1>
                <p class="light_para">Auction</p>
              </div>
              <!-- content -->
            </div>
          </div>

          <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <div class="bitCards d-flex align-items-center px-3">
              <!-- icon -->
              <div class="bitCard_icon bg_three">
                <img src="./assests/icons&images/writer.png" alt="">
              </div>
              <!-- icon -->
              <!-- content -->
              <div class="bitCard_Contnet">
                <h1 class="walletBalance"><?php echo $_SESSION['userWallet'];?></h1>
                <p class="light_para">Creators</p>
              </div>
              <!-- content -->
            </div>
          </div>

          <div class="col-12 col-sm-12 col-md-3 col-lg-3  my-3 my-md-0">
            <div class="bitCards d-flex align-items-center px-3">
              <!-- icon -->
              <div class="bitCard_icon bg_four">
                <img src="./assests/icons&images/cancel.png" alt="">
              </div>
              <!-- icon -->
              <!-- content -->
              <div class="bitCard_Contnet">
                <h1>89</h1>
                <p class="light_para">Canceled</p>
              </div>
              <!-- content -->
            </div>
          </div>
        </div>

        <div class="row mt-2 mt-md-5 mb-3">
          <div class="col-12 col-sm-12 col-md-6 text-center text-md-start">
            <h1 class="mb-4 mb-md-0">Active Bids</h1>
          </div>
          <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center  justify-content-md-end">
            <button class="placeabit_Button" name="placebid" id="placeBid">Place a Bid</button>
          </div>
        </div>

        <div class="row py-3 bidsShow" id="bidsShow">

        </div>

      </div>
    </section>
    <!-- bets section -->
  </main>

  <!-- Footer -->
  <?php require_once 'inc/footer.php'; ?>
  <!-- Footer -->

  <?php require_once 'inc/js.php'; ?>

  <script>
    $('.placeabit_Button').on('click', function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: 'bid.php',
        data: {
          productid: <?php echo $_GET['id'] ?>
        },
        success: function(data) {
         if(data == 'error'){
           alertify.alert('Insuficient Ballance, Please top up your wallet to proceed. ')

         }

         else{
          document.querySelector(`.walletBalance`).textContent = document.querySelector(`.walletBalance`).textContent-1;
         }
          biddata()

        }
      });
    })



    function biddata() {
      $.ajax({
        type: "POST",
        url: 'biddata.php',
        data: {
          productid: <?php echo $_GET['id'] ?>
        },
        success: function(biddata) {
          $('#bidsShow').html(biddata)
        }
      })
    }

    setInterval(function() {
      biddata()
    }, 1000);

    const timerFunction = function(distance, elem) {
      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById(elem).innerHTML =
        minutes + "m " + seconds + "s ";

    }
    let x = setInterval(function() {
      var countDownDate2 = new Date(
        "<?php echo date('Y-m-d H:i', strtotime('+10 minutes', strtotime($data['starting_from']))); ?>").getTime();

      var now2 = new Date().getTime();

      var distance2 = countDownDate2 - now2;

      timerFunction(distance2, 'timer');
      if (distance2 < 0) {
        clearInterval(x);
        document.getElementById('timer').innerHTML =
          "00" + "m " + "00" + "s ";

        <?php

        $winnercheck = mysqli_query($conn, "SELECT * FROM " . $tblPrefix . "winnig WHERE auction_id = '$auctionid' AND auction_name= '$auctionname'");

        if (mysqli_num_rows($winnercheck) > 0) {
          unset($_SESSION['userWallet']);
        ?>
          window.location.replace("winningPage.php");
          <?php
        } else {
          $bidinginsert =  mysqli_query($conn, "INSERT INTO " . $tblPrefix . "winnig(`winner_name`, `Winner_email`, `amount`, `auction_id`, `auction_name`) VALUES ('$userName','$useremail','$winamount','$auctionid','$auctionname')");
          if ($bidinginsert) {
            if(updateWallet($winamount)){
              makeAuctionTransaction($winamount,$auctionid);
              unset($_SESSION['userWallet']);
            }
          ?>
            window.location.replace("winningPage.php");
        <?php
          }
        }
        ?>


      }
    }, 1000);
  </script>
</body>

</html>