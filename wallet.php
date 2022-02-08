<?php
   require_once 'inc/config.php';
   $pageName="Wallet";
echo $_SESSION['user']['id'];
   $data = mysqli_query($conn,"SELECT wt.id, wt.user, wt.package, wt.data, wt.date_time, at.user_id, at.auction_id, at.token, at.date_time as auctionTransactioTime  FROM `".$tblPrefix."wallet_transactions` wt LEFT JOIN `".$tblPrefix."auction_transactions` at ON wt.user = at.user_id WHERE wt.user = 9");
   
   echo "<pre/>";

   print_r(mysqli_fetch_assoc($data));
   die();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wallet</title>

  <!-- Bootstarp 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <!-- Style sheet Link -->
  <link rel="stylesheet" href="./assests/style/global.css" />
  <link rel="stylesheet" href="./assests/style/navbar.css" />
  <link rel="stylesheet" href="./assests/style/button.css" />
  <link rel="stylesheet" href="./assests/style/footer.css" />
  <link rel="stylesheet" href="./assests/style/Home.css" />
  <link rel="stylesheet" href="./assests/style/responsive.css" />
  <link rel="stylesheet" href="./assests/style/content.css" />
  <link rel="stylesheet" href="./assests/style/howItWorks.css" />
  <link rel="stylesheet" href="./assests/style/userProfile.css" />
  <link rel="stylesheet" href="./assests/style/wallet.css" />

  <!-- Slick Slider CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
</head>

<body>
  <!-- Header -->
  <header>
    <!-- Top Header -->
    <div class="Top_Header">
      <div class="Top_Header_Inner container-fluid side_padding">
        <div class="Top_Navbar_Inner_Sm_div">
          <i class="fas fa-envelope"></i>
          <p class="text-white">loremipsum@gmail.com</p>
        </div>

        <!-- Top navbar icons -->
        <div class="Top_Navbar_Inner_Sm_div">
          <i class="fab fa-facebook-f"></i>
          <i class="fab fa-instagram"></i>
          <i class="fab fa-linkedin-in"></i>
          <i class="fab fa-twitter"></i>
        </div>
        <!-- Top navbar icons -->
      </div>
    </div>
    <!-- Top Header -->

    <!-- Main-Navbar -->
    <div class="Top_second_naber py-1">
      <div class="container-fludi side_padding">
        <nav class="navbar navbar-expand-xxl navbar-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="./home.html">
              <h1>Smart-Auction</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./home.html">HOME</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./howItWorks.html">HOW IT WORKS</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./Ended.html">ENDED AUCTIONS</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./currentAuctions.html">CURRENT AUCTIONS</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./contact.html">CONTACT</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./Buy_token.html">BUY TOKENS</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link active active_header" aria-current="page" href="./MyAccount.html">AALBOUCHI</a>
                </li> -->

                <li class="nav-item">
                  <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle drop" type="button" id="dropdownMenuButton1"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      AALBOUCHI
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="./MyAccount.html">My Account</a></li>
                      <li><a class="dropdown-item" href="#">Sign Out</a></li>
                    </ul>
                  </div>
                </li>

                <div class="sign_in_button d-flex align-items-center ms-5">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./logIn.html">LOG IN</a>
                  </li>
                  <a class="Subcribe_button_sm text-white" href="./register.html">REGISTER </a>
                </div>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!-- Main-Navbar -->
  </header>
  <!-- Header -->

  <main>
    <!-- Banner section -->
    <section class="Banner_Section_div">
      <h1 class="text-white banner_heading">MY <span>WALLET</span></h1>
    </section>
    <!-- Banner section -->

    <!-- My BET -->
    <div class="My_Bet_section padding_one main_bg">
      <div class="container-fluid side_padding">
        <!-- User Profile div -->
        <div class="row">
          <div class="col-12 py-5 user_margin_class">
            <div class="user_products_card d-flex align-items-center">
              <div class="user_CR">
                <img src="./assests/icons&images/mybit/julian-wan-WNoLnJo7tS8-unsplash.jpg" alt="" />

                <!-- <div class="edit_option">
                  <img src="./assests/icons&images/mybit/pencil 1.png" alt="" />
                </div> -->
              </div>

              <div class="ms-4 mt-4 mt-mb-0">
                <h3>Percy Reed</h3>
                <p>John@gmail.com</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- My BET -->

    <section class="wallet main_bg pb-5">
      <div class="container">
        <div class="row">
          <!-- My Wallet Desing -->
          <div class="row  justify-content-center">

            <div class="col-12">
              <div class="d-flex BalanceDiv justify-content-between align-items-center">
                <h1>Balance</h1>
                <p><span>$</span> 300.00</p>
              </div>

              <div class="AlTranstion mt-3">
                <p class="light_para">Transations</p>

                <div class="row transionDiv">
                  <div class="col-12 col-sm-12 col-md-6">
                    <div class="d-flex align-items-center">
                      <div class="transferMoney_Div upper me-3">
                        <i class="fas fa-plus"></i>
                      </div>
                      <div>
                        <h3>Money Transfer Jhone</h3>
                        <div class="d-flex mt-2">
                          <p class="light_para">12/10/2022</p>
                          <p class="light_para ms-3">15:30</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 transferData upperPrice col-sm-12 col-md-6 d-flex justify-content-end">
                    <div>
                      <h3>$200.00</h3>
                      <p class="light_para mt-1">Transfer</p>
                    </div>
                  </div>
                </div>

                <div class="row transionDiv">
                  <div class="col-12 col-sm-12 col-md-6">
                    <div class="d-flex align-items-center">
                      <div class="transferMoney_Div lower me-3">
                        <i class="fas fa-minus"></i>
                      </div>
                      <div>
                        <h3>Money Transfer Jhone</h3>
                        <div class="d-flex mt-2">
                          <p class="light_para">10/10/2022</p>
                          <p class="light_para ms-3">10:00</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 transferData lowerPrice col-sm-12 col-md-6 d-flex justify-content-end">
                    <div>
                      <h3>$100.00</h3>
                      <p class="light_para mt-1">Transfer</p>
                    </div>
                  </div>
                </div>

                <div class="row transionDiv">
                  <div class="col-12 col-sm-12 col-md-6">
                    <div class="d-flex align-items-center">
                      <div class="transferMoney_Div upper me-3">
                        <i class="fas fa-plus"></i>
                      </div>
                      <div>
                        <h3>Money Transfer Jhone</h3>
                        <div class="d-flex mt-2">
                          <p class="light_para">12/10/2022</p>
                          <p class="light_para ms-3">15:30</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 transferData upperPrice col-sm-12 col-md-6 d-flex justify-content-end">
                    <div>
                      <h3>$200.00</h3>
                      <p class="light_para mt-1">Transfer</p>
                    </div>
                  </div>
                </div>

                <div class="row transionDiv">
                  <div class="col-12 col-sm-12 col-md-6">
                    <div class="d-flex align-items-center">
                      <div class="transferMoney_Div lower me-3">
                        <i class="fas fa-minus"></i>
                      </div>
                      <div>
                        <h3>Money Transfer Jhone</h3>
                        <div class="d-flex mt-2">
                          <p class="light_para">10/10/2022</p>
                          <p class="light_para ms-3">10:00</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 transferData lowerPrice col-sm-12 col-md-6 d-flex justify-content-end">
                    <div>
                      <h3>$100.00</h3>
                      <p class="light_para mt-1">Transfer</p>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </div>
          <!-- My Wallet Desing -->
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="footer side_padding">
    <!-- Footer -->
    <div class="container padding_one">
      <div class="row pt-4 justify-content-center">
        <div class="col-12 col-sm-6 col-md-4 col-lg-5">
          <h1 class="text-white my-3">SMART-AUCTION</h1>
          <p class="light_para">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio <br />
            voluptatem qui magnam aliquid cum atque tempore quia? Quis,<br />
            doloribus commodi.
          </p>

          <!-- Footer icons -->
          <!-- <div class="footer_icons">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-linkedin-in"></i>
            <i class="fab fa-twitter"></i>
          </div> -->
          <!-- Footer icons -->
        </div>

        <div class="col-12 col-sm-6 col-md-3 col-lg-2 mt-3 mt-md-0">
          <h1 class="text-white my-3">USEFUL LINKS</h1>
          <p class="light_para"><a href="./woWeare.html">Who are we?</a></p>
          <p class="light_para"><a href="./howItWorks.html">How it works?</a></p>
          <p class="light_para"><a href="./terms.html">Terms and Conditions</a></p>
          <p class="light_para"><a href="./legal.html">Legal</a></p>
        </div>

        <!-- <div class="col-12 col-sm-6 col-md-3 col-lg-3">
          <h1 class="text-white my-3">STAY IN TOUCH</h1>
          <div class="footer-icons_div d-flex align-items-center">
            <i class=" fas fa-map-marker-alt text-white"></i>
            <p class="light_para mb-0 ms-3"><a href="#">Residence les dunes tanisay, 2033 Akolk, UK City</a></p>
          </div>
  
          <div class="footer-icons_div my-3 d-flex align-items-center">
            <i class="fas fa-phone-alt text-white"></i>
            <p class="light_para mb-0 ms-3"><a href="#">7352-256-546-202</a></p>
          </div>
  
          <div class="footer-icons_div d-flex align-items-center">
            <i class="fas fa-mail-bulk text-white"></i>
            <p class="light_para mb-0 ms-3"><a href="#">contact@gami.com</a></p>
          </div>
  
  
        </div> -->

        <div class="col-12 col-sm-6 col-md-4 col-lg-4 ms-lg-5 ms-md-0">
          <h1 class="text-white my-3">NEWSLETTER</h1>
          <!-- <p class="light_para">Lorem ipsum dolor sit amet consectetur adipisicing.</p> -->

          <!-- News letter section -->
          <div class="newsLetter_search">
            <input type="search" placeholder="Enter your email" />
            <div class="newlettButton">SUBSCRIBE</div>
          </div>
          <!-- News letter section -->

          <!-- <p class="light_para"><a href="#">Payment Methods</a></p>
          <p class="light_para"><a href="#">Money-back gurantee</a></p>
          <p class="light_para"><a href="#">Return</a></p>
          <p class="light_para"><a href="#">Shipping</a></p>
          <p class="light_para"><a href="#">Terms and conditions</a></p>
          <p class="light_para"><a href="#">Privacy Prolicy</a></p> -->
        </div>
      </div>
    </div>
    <!-- Footer -->

    <!-- Footer Second -->
    <div class="container-fluid footer_second">
      <div class="row">
        <div class="d-flex justify-content-around py-3">
          <p class="light_para">Copyright © 2021. All Rights Reserved.</p>
          <p class="light_para">
            <a href="./terms.html"> Terms of Use </a> and
            <a href="./policy.html"> Privacy Policy </a>
          </p>
        </div>
      </div>
    </div>
    <!-- Footer Second -->
  </footer>
  <!-- Footer -->

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- slick -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

  <!-- Bootsrap 5 script CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>