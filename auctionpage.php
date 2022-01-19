<?php
require_once "./session.php";
require_once "./model/auction.php";
require_once "./getValuesByName.php";
require_once "./functions.php";

if (!isset($_GET["token"])) {
    header("Location: ./auction.php");
    die();
}

if (!isset($_SESSION["email"]) && !isset($_SESSION["userId"])) {
    header("Location: ./logIn.php");
    die();
}
$auction = new Auction();
$auctionData = $auction->getAuctionByToken($_GET["token"]);

if (!$auctionData) {
    header("HTTP/1.0 404 Not Found");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Auction</title>

    <!-- Bootstarp 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <!-- Style sheet Link -->

    <link rel="stylesheet" href="./assests/style/Home.css" />
    <link rel="stylesheet" href="./assests/style/global.css" />
    <link rel="stylesheet" href="./assests/style/navbar.css" />
    <link rel="stylesheet" href="./assests/style/button.css" />
    <link rel="stylesheet" href="./assests/style/howItWorks.css" />
    <link rel="stylesheet" href="./assests/style/content.css">
    <link rel="stylesheet" href="./assests/style/footer.css" />
    <link rel="stylesheet" href="./assests/style/logIn.css" />
    <link rel="stylesheet" href="./assests/style/userProfile.css" />
    <link rel="stylesheet" href="./assests/style/blog.css" />
    <link rel="stylesheet" href="./assests/style/MyAccount.css" />
    <link rel="stylesheet" href="./assests/style/buy_token.css" />
    <link rel="stylesheet" href="./assests/style/wallet.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="icon" href="<?php echo "./media/" . getValuesByName("favicon") ?>">
    <script>
    const userId = "<?php echo $_SESSION["userId"] ?>";
    const email = "<?php echo $_SESSION["email"] ?>";
    const token = "<?php echo $_GET["token"] ?>";
    const auctionId = "<?php echo $auctionData["id"] ?>";
    </script>
</head>

<body>


    <!-- Header -->
    <header>
        <!-- Top Header -->
        <div class="Top_Header">
            <div class="Top_Header_Inner container-fluid side_padding">
                <div class="Top_Navbar_Inner_Sm_div">
                    <i class="fas fa-envelope"></i>
                    <p class="text-white"><?php echo getValuesByName("email") ?></p>
                </div>

                <!-- Top navbar icons -->
                <div class="Top_Navbar_Inner_Sm_div">
                    <a href="<?php echo getValuesByName("facebook") ?>">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="<?php echo getValuesByName("instagram") ?>">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="<?php echo getValuesByName("linkedin") ?>">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="<?php echo getValuesByName("twitter") ?>">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
                <!-- Top navbar icons -->

            </div>
        </div>
        <!-- Top Header -->

        <!-- Main-Navbar -->
        <div class="Top_second_naber py-1">
            <div class="container-fludi side_padding">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="./index.php">
                            <!-- <h1>Auction</h1> -->
                            <img width="50px" height="50px" src="<?php echo "./media/" . getValuesByName("logo") ?>"
                                alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active_header" aria-current="page" href="./">HOME</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active " aria-current="page" href="./howItWorks.php">HOW IT
                                        WORKS</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">ENDED AUCTIONS</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">CURRENT AUCTION</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">CUY TOKENS</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">ALBOCHI</a>
                                </li>


                                <?php if (isset($_SESSION["email"])) : ?>
                                <div class="profile-info">
                                    <a href="./userProfile.php">
                                        <img style="width: 50px; height: 50px; border-radius: 50%"
                                            src="./media/img/users/default.png" alt="profile-img">
                                    </a>
                                </div>
                                <?php else : ?>
                                <div class="sign_in_button d-flex align-items-center ms-5">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="./logIn.php">SIGN IN</a>
                                    </li>
                                    <a href="./register.php" class="Subcribe_button_sm text-white">REGISTER</a>
                                </div>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Main-Navbar -->

    </header>
    <!-- Header -->

    <!-- Main -->
    <main>
        <!---Card-->
        <section class="py-5 px-5 mb-5">
            <div class="container">
                <div class="row g-3">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <img src="./media/img/product/<?php echo $auctionData["product_img"] ?>"
                            class="d-block w-75 img-fluid img_slide" alt="..." />
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6  ">
                        <h3 class="fw-bold"><?php echo $auctionData["product_name"] ?></h3>
                        <h5><?php echo getAucitonCategory($auctionData["category"]) ?></h5>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                            <p><?php echo $auctionData["discription"] ?></p>
                        </div>
                        <h3 id="waiting-time">Waiting time</h3>
                        <h3 class="h2">time: <span id="time">00:00</span></h3>
                        <div class="d-flex mt-2">
                            <div>
                                <p class="h3">Store price:</p>
                                <p class="h5"><?php echo $auctionData["store_price"]; ?></p>
                            </div>
                            <div class="ms-auto">
                                <p class="h3 fw-bolder ">New price:</p>
                                <p id="new-price" class="h5"><?php echo $auctionData["starting_price"] + 20; ?></p>
                            </div>
                        </div>
                        <div id="number-of-people">
                            <p class="h3 mt-1 ">Number of coupons</p>
                            <p id="users" class="h4 fw-light">0</p>
                        </div>
                        <div class="mt-3">
                            <div class="card border-0 ">
                                <h5 class="card-title  mb-1">Specification</h5>
                                <div class="card-body">
                                    <h5 class="card-subtitle mb-2 ">General</h5>
                                    <p> <span class="h6 ">Battery:</span> <span class="h6 px-5">99wh</span> </p>
                                    <p> <span class="h6 ">Storage:</span> <span class="h6 px-5">99wh</span> </p>
                                    <p> <span class="h6 ">Display:</span> <span class="h6 px-5">99wh</span> </p>
                                </div>
                            </div>
                        </div>

                        <button id="submit-btn"
                            class="btn btn-lg rounded-pill h4 fw-bolder btn-danger buy_Button mb-5">Submit</button>
                    </div>
                </div>
        </section>
        <!-- News Letter Section -->
    </main>
    <!-- Main -->

    <!-- Footer -->
    <!-- Footer -->
    <footer class="footer side_padding ">
        <!-- Footer -->
        <div class="container padding_one">
            <div class="row pt-4 justify-content-center">
                <div class="col-12 col-sm-6 col-md-4 col-lg-5">
                    <h1 class="text-white my-3">SMART-AUCTION</h1>
                    <p class="light_para">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio
                        <br />
                        voluptatem qui magnam aliquid cum atque tempore quia? Quis,<br />
                        doloribus commodi.
                    </p>

                    <!-- Footer icons -->
                </div>

                <div class="col-12 col-sm-6 col-md-3 col-lg-2 mt-3 mt-md-0">
                    <h1 class="text-white my-3">USEFUL LINKS</h1>
                    <p class="light_para"><a href="./woWeare.html">Who are we?</a></p>
                    <p class="light_para">
                        <a href="./howItWorks.html">How it works?</a>
                    </p>
                    <p class="light_para">
                        <a href="./terms.html">Terms and Conditions</a>
                    </p>
                    <p class="light_para"><a href="./legal.html">Legal</a></p>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-4 ms-lg-5 ms-md-0">
                    <h1 class="text-white my-3">NEWSLETTER</h1>
                    <!-- <p class="light_para">Lorem ipsum dolor sit amet consectetur adipisicing.</p> -->

                    <!-- News letter section -->
                    <div class="newsLetter_search">
                        <input type="search" placeholder="Enter your email" />
                        <div class="newlettButton">SUBSCRIBE</div>
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
    <!-- Footer -->

    <!-- Bootsrap 5 script CDN -->
    <script src="./assests/js/auction2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" class="img-fluid"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" class="img-fluid"></script>
</body>

</html>