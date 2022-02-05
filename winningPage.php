<?php require_once 'inc/config.php';?>
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
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, vitae!
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
                  <div class="User_Winner_Div second_winner">
                    <img
                      src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                      alt="" class="img-fluid">

                    <!-- user content -->
                    <div class="user_Price_Contnet">
                      <p>@Player Second</p>
                      <h3>$908</h3>
                    </div>
                    <!-- user content -->

                  </div>
                  <div class="User_Winner_Div first_winner">
                    <img
                      src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2080&q=80"
                      alt="">

                    <!-- user content -->
                    <div class="user_Price_Contnet">
                      <p>@Player One</p>
                      <h3>$9088</h3>
                    </div>
                    <!-- user content -->

                  </div>
                  <div class="User_Winner_Div third_winner">
                    <img
                      src="https://images.unsplash.com/photo-1586297135537-94bc9ba060aa?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                      alt="" class="img-fluid">

                    <!-- user content -->
                    <div class="user_Price_Contnet">
                      <p>@Plyear Threed</p>
                      <h3>$809</h3>
                    </div>
                    <!-- user content -->
                  </div>
                  <!-- all winner users -->
                </div>

                <!-- <div class="Winner_Time py-2 mt-5 mb-2"></div> -->

              </div>
              <!-- Acution winning inner card -->
              <div class="auctionCard_Content py-3">
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 70%;" aria-valuenow="25" aria-valuemin="0"
                    aria-valuemax="100">70%</div>
                </div>
                <!-- All Card -->
                <div class="allCard_div my-3">
                  <div class="row  gx-0">
                    <div class="col-12 col-sm-12 col-md-2 d-flex justify-content-center align-items-center">
                      <p>1</p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-2 d-flex justify-content-center my-2 my-md-0">
                      <div class="uerWinner_icons">
                        <i class="fas fa-user"></i>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                      <p>@Player One</p>
                    </div>
                    <div
                      class="col-12 col-sm-12 col-md-2 d-flex justify-content-center align-items-center my-2 my-md-0">
                      <p>$4250</p>
                    </div>
                  </div>


                </div>

                <div class="allCard_div my-3">
                  <div class="row gx-0">
                    <div class="col-12 col-sm-12 col-md-2 d-flex justify-content-center align-items-center">
                      <p>2</p>
                    </div>
                    <div class="col-12 col-sm-12 d-flex justify-content-center col-md-2">
                      <div class="uerWinner_icons my-2 my-md-0">
                        <i class="fas fa-user"></i>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                      <p>@Player Two</p>
                    </div>
                    <div
                      class="col-12 col-sm-12 col-md-2 d-flex justify-content-center align-items-center my-2 my-md-0">
                      <p>$4250</p>
                    </div>
                  </div>


                </div>

                <div class="allCard_div my-3">
                  <div class="row gx-0">
                    <div class="col-12 col-sm-12 col-md-2 d-flex justify-content-center align-items-center">
                      <p>3</p>
                    </div>
                    <div class="col-12 col-sm-12 d-flex justify-content-center col-md-2 my-2 my-md-0">
                      <div class="uerWinner_icons">
                        <i class="fas fa-user"></i>
                      </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-5 d-flex justify-content-center align-items-center">
                      <p>@Player Three</p>
                    </div>
                    <div
                      class="col-12 col-sm-12 col-md-2 d-flex justify-content-center align-items-center my-2 my-md-0">
                      <p>$4250</p>
                    </div>
                  </div>


                </div>
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
                    <div
                      class="col-12 col-sm-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-center">
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

            <div class="row mt-5">
              <div class="col-12 my-4 my-xxl-0 col-xxl-6 d-flex justify-content-center">
                <div class="row user_sub_cards">
                  <div
                    class="col-12 col-sm-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start mb-3 mb-md-0">
                    <div class="user_sub_img ">
                      <img
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                        alt="" class="img-fluid">
                    </div>
                    <div class="user_sub_card ms-4">
                      <h1>Jhon</h1>
                      <p class="light_para">$9000</p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end ">
                    <button class="View_More_Button">View More</button>
                  </div>
                </div>

              </div>

              <div class="col-12 my-4 my-xxl-0 col-xxl-6 d-flex justify-content-center">
                <div class="row user_sub_cards">
                  <div
                    class="col-12 col-sm-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start mb-3 mb-md-0">
                    <div class="user_sub_img ">
                      <img
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                        alt="" class="img-fluid">
                    </div>
                    <div class="user_sub_card ms-4">
                      <h1>Jhon</h1>
                      <p class="light_para">$9000</p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end ">
                    <button class="View_More_Button">View More</button>
                  </div>
                </div>

              </div>
            </div>

            <div class="row mt-lg-0 mt-xxl-5">
              <div class="col-12 my-4 my-xxl-0 col-xxl-6 d-flex justify-content-center">
                <div class="row user_sub_cards">
                  <div
                    class="col-12 col-sm-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start mb-3 mb-md-0">
                    <div class="user_sub_img ">
                      <img
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                        alt="" class="img-fluid">
                    </div>
                    <div class="user_sub_card ms-4">
                      <h1>Jhon</h1>
                      <p class="light_para">$9000</p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end ">
                    <button class="View_More_Button">View More</button>
                  </div>
                </div>

              </div>

              <div class="col-12 my-4 my-xxl-0 col-xxl-6 d-flex justify-content-center">
                <div class="row user_sub_cards">
                  <div
                    class="col-12 col-sm-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start mb-3 mb-md-0">
                    <div class="user_sub_img ">
                      <img
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                        alt="" class="img-fluid">
                    </div>
                    <div class="user_sub_card ms-4">
                      <h1>Jhon</h1>
                      <p class="light_para">$9000</p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end ">
                    <button class="View_More_Button">View More</button>
                  </div>
                </div>

              </div>
            </div>

            <div class="row mt-lg-0 mt-xxl-5">
              <div class="col-12 my-4 my-xxl-0 col-xxl-6 d-flex justify-content-center">
                <div class="row user_sub_cards">
                  <div
                    class="col-12 col-sm-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start mb-3 mb-md-0">
                    <div class="user_sub_img ">
                      <img
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                        alt="" class="img-fluid">
                    </div>
                    <div class="user_sub_card ms-4">
                      <h1>Jhon</h1>
                      <p class="light_para">$9000</p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end ">
                    <button class="View_More_Button">View More</button>
                  </div>
                </div>

              </div>

              <div class="col-12 my-4 my-xxl-0 col-xxl-6 d-flex justify-content-center">
                <div class="row user_sub_cards">
                  <div
                    class="col-12 col-sm-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start mb-3 mb-md-0">
                    <div class="user_sub_img ">
                      <img
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                        alt="" class="img-fluid">
                    </div>
                    <div class="user_sub_card ms-4">
                      <h1>Jhon</h1>
                      <p class="light_para">$9000</p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end ">
                    <button class="View_More_Button">View More</button>
                  </div>
                </div>

              </div>
            </div>

            <div class="row mt-lg-0 mt-xxl-5">
              <div class="col-12 my-4 my-xxl-0 col-xxl-6 d-flex justify-content-center">
                <div class="row user_sub_cards">
                  <div
                    class="col-12 col-sm-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start mb-3 mb-md-0">
                    <div class="user_sub_img ">
                      <img
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                        alt="" class="img-fluid">
                    </div>
                    <div class="user_sub_card ms-4">
                      <h1>Jhon</h1>
                      <p class="light_para">$9000</p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end ">
                    <button class="View_More_Button">View More</button>
                  </div>
                </div>

              </div>

              <div class="col-12 my-4 my-xxl-0 col-xxl-6 d-flex justify-content-center">
                <div class="row user_sub_cards">
                  <div
                    class="col-12 col-sm-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start mb-3 mb-md-0">
                    <div class="user_sub_img ">
                      <img
                        src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=880&q=80"
                        alt="" class="img-fluid">
                    </div>
                    <div class="user_sub_card ms-4">
                      <h1>Jhon</h1>
                      <p class="light_para">$9000</p>
                    </div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end ">
                    <button class="View_More_Button">View More</button>
                  </div>
                </div>

              </div>
            </div>

            <!-- all auction winner -->
          </div>

        </div>
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