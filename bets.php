<?php
   require_once 'inc/config.php';
   $pageName="Auction Bets";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'inc/head.php';?>

  <link rel="stylesheet" href="./assests/style/howItWorks.css" />
  <link rel="stylesheet" href="./assests/style/bets.css" />
</head>

<body>
  <!-- Header -->
  <?php require_once 'inc/header.php';?>
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
                <h1>24K</h1>
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
                <h1>200</h1>
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
            <button class="placeabit_Button">Place a Bid</button>
          </div>
        </div>

        <div class="row py-3 bidsShow" id="bidsShow">
          
        </div>

      </div>
    </section>
    <!-- bets section -->
  </main>

  <!-- Footer -->
  <?php require_once 'inc/footer.php';?>
  <!-- Footer -->

  <?php require_once 'inc/js.php';?>

  <script>
    const bidBtn = document.querySelector(`.placeabit_Button`)
    const bids = document.querySelector(`.bidsShow`)
    const html = `<div class="col-12">
            <div class="userBitting_current">

              <div class="row">
                <div class="col-12 col-sm-12 col-md-6">
                  <div class="row">
                    <div class="col-4 full_width col-md-4">
                      <h1>iPhone Pro</h1>
                      <p class="light_para">Jhon Abram</p>
                    </div>
                    <div class="col-4 full_width col-md-4 d-flex align-items-center">
                      <p class="light_para">0.0025 ETH</p>
                    </div>

                    <div class="col-4  full_width col-md-4 d-flex align-items-center">
                      <p class="light_para">0.0025 ETH</p>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 pt-3 pt-md-0">
                  <div class="row">
                    <div class="col-4 full_width col-md-5 d-flex align-items-center">
                      <div class="user_icons_profile">
                        <img
                          src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1448&q=80"
                          alt="">
                      </div>
                      <p class="light_para ms-3">0.0023 ETH</p>
                    </div>
                    <div class="col-4 full_width col-md-3 d-flex align-items-center">
                      <p class="light_para">2 Hours 1 min 30s</p>
                    </div>
                    <div
                      class="col-4 full_width col-md-3 d-flex align-items-center justify-content-start justify-content-md-end">
                      <p class="light_para">$200.9</p>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>`

    bidBtn.addEventListener(`click`, function(){
          // bids.insertAdjacentHTML(`afterbegin`,html)
          document.getElementById(`bidsShow`).load(bids.insertAdjacentHTML(`afterbegin`,html))
    })
    
  </script>
  <!-- <script>
    setInterval(function() {
      document.getElementById(`bidsShow`).load(html)
    }, 10000);
  </script> -->
</body>

</html>