<?php
require_once "./session.php";
require_once "./model/auction.php";
require_once "./getValuesByName.php";
require_once "./redis.php";
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
$redis = new RedisConnection($_GET["token"]);
$currentBid = $redis->getCurrentBid();
$pageName = "bets";
$connectedUsers = count($redis->getUsers());
if (!$currentBid) {
    $currentBid = $auctionData["starting_price"];
}

if (!$auctionData) {
    header("HTTP/1.0 404 Not Found");
    die();
}

if (strtotime(date("Y-m-d")) > strtotime($auctionData["date"])) {
    $auctionId = $auctionData["id"];
    header("Location: ./winningPage.php?id=$auctionId");
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
    <link rel="stylesheet" href="./assests/style/ended.css" />
    <link rel="stylesheet" href="./assests/style/wallet.css" />
    <link rel="stylesheet" href="./assests/style/PaymentSuccessful.css">
    <link rel="stylesheet" href="./assests/style/paymentFail.css">
    <link rel="stylesheet" href="./assests/style/responsive.css">
    <link rel="stylesheet" href="./assests/style/currentAuctions.css" />
    <link rel="stylesheet" href="./assests/style/winningPage.css" />
    <link rel="stylesheet" href="./assests/style/policy.css" />
    <link rel="stylesheet" href="./assests/style/bets.css" />
    <link rel="stylesheet" href="./assests/style/alerts.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="icon" href="<?php echo "./media/" . getValuesByName("favicon") ?>">
    <script>
    const userId = "<?php echo $_SESSION["userId"] ?>";
    const email = "<?php echo $_SESSION["email"] ?>";
    const token = "<?php echo $_GET["token"] ?>";
    const auctionId = "<?php echo $auctionData["id"] ?>";
    const profileImg = "<?php echo $_SESSION["profile_image"] ?>";
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
                    <a href="mailto:<?php echo getValuesByName("email") ?>"
                        class="text-white"><?php echo getValuesByName("email") ?></a>
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
                                <?php if ($pageName == "Home") : ?>
                                <li class="nav-item">
                                    <a class="nav-link active_header" aria-current="page" href="./">HOME</a>
                                </li>
                                <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="./">HOME</a>
                                </li>
                                <?php endif; ?>
                                <?php if ($pageName == "How It Works") : ?>
                                <li class="nav-item">
                                    <a class="nav-link active_header " aria-current="page" href="./howItWorks.php">HOW
                                        IT
                                        WORKS</a>
                                </li>
                                <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link active " aria-current="page" href="./howItWorks.php">HOW IT
                                        WORKS</a>
                                </li>
                                <?php endif; ?>
                                <?php if ($pageName == "Ended") : ?>
                                <li class="nav-item">
                                    <a class="nav-link active_header" aria-current="page" href="./Ended.php">ENDED
                                        AUCTIONS</a>
                                </li>
                                <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="./Ended.php">ENDED AUCTIONS</a>
                                </li>

                                <?php endif; ?>
                                <?php if ($pageName == "Current Auction") : ?>
                                <li class="nav-item">
                                    <a class="nav-link active_header" aria-current="page"
                                        href="./currentAuctions.php">CURRENT
                                        AUCTION</a>
                                </li>
                                <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="./currentAuctions.php">CURRENT
                                        AUCTION</a>
                                </li>
                                <?php endif; ?>
                                <?php if ($pageName == "Buy Token") : ?>
                                <li class="nav-item">
                                    <a class="nav-link active_header" aria-current="page" href="Buy_token.php">BUY
                                        TOKENS</a>
                                </li>
                                <?php else : ?>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="Buy_token.php">BUY TOKENS</a>
                                </li>
                                <?php endif; ?>


                                <?php if (isset($_SESSION["email"])) : ?>
                                <li class="nav-item">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle drop" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            AALBOUCHI
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="./MyAccount.php">My Account</a></li>
                                            <li><a class="dropdown-item" href="./wallet.php">Your Wallet</a></li>
                                            <li><a class="dropdown-item" href="./signout.php">Sign Out</a></li>
                                        </ul>
                                    </div>
                                </li>

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
    <?php if (isset($_SESSION["flash"])) : ?>
    <?php if ($_SESSION["flash"]["type"] == "warning") : ?>
    <div class="c-alert warning">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
            </svg>
        </div>
        <div class="message"><?php echo $_SESSION['flash']['message'] ?></div>
        <div class="close">
            <button id="close">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x"
                    viewBox="0 0 16 16">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>
            </button>
        </div>
    </div>
    <?php elseif ($_SESSION["flash"]["type"] == "danger") : ?>
    <div class="c-alert danger">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
            </svg>
        </div>
        <div class="message"><?php echo $_SESSION['flash']['message'] ?></div>
        <div class="close">
            <button id="close">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x"
                    viewBox="0 0 16 16">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>
            </button>
        </div>
    </div>

    <?php elseif ($_SESSION["flash"]["type"] == "success") : ?>
    <div class="c-alert success">
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                class="bi bi-check2-circle" viewBox="0 0 16 16">
                <path
                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                <path
                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
            </svg>
        </div>
        <div class="message"><?php echo $_SESSION["flash"]["message"]; ?></div>
        <div class="close">
            <button id="close">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x"
                    viewBox="0 0 16 16">
                    <path
                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg>
            </button>
        </div>
    </div>
    <?php endif; ?>
    <?php unset($_SESSION["flash"]) ?>
    <?php endif; ?>
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

                <div class="row py-3" style="display: flex; justify-content: space-around; align-items: center">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 ">
                        <div class="bitCards d-flex align-items-center px-3">
                            <!-- icon -->
                            <div class="bitCard_icon bg_one">
                                <img src="./assests/icons&images/law-auction-svgrepo-com.svg" alt="">
                            </div>
                            <!-- icon -->
                            <!-- content -->
                            <div class="bitCard_Contnet">
                                <h1 id="new-price"><?php echo (int)$currentBid + 20; ?></h1>
                                <p class="light_para">Current Bid</p>
                            </div>
                            <!-- content -->
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 my-3 my-md-0">
                        <div class="bitCards d-flex align-items-center px-3">
                            <!-- icon -->
                            <div class="bitCard_icon bg_two">
                                <img src="./assests/icons&images/clock.jpg" alt="clock">
                            </div>
                            <!-- icon -->
                            <!-- content -->
                            <div class="bitCard_Contnet">
                                <h1 id="time"></h1>
                                <p id="waiting-time" class="light_para">Waiting</p>
                                <p class="light_para">Timer</p>
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
                                <h1 id="number-of-people"><?php echo $connectedUsers ?></h1>
                                <p class="light_para">Connect Users</p>
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
                        <button id="submit-btn" class="placeabit_Button">Place a Bid</button>
                    </div>
                </div>

                <div id="bid-bubbles">
                    <div class="row py-3">
                        <div class="col-12">
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
                                                    <img src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1448&q=80"
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
                        </div>
                    </div>

                    <div class="row py-3">
                        <div class="col-12">
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
                                                    <img src="https://images.unsplash.com/photo-1543965860-82ed7d542cc4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1460&q=80"
                                                        alt="">
                                                </div>
                                                <p class="light_para ms-3">0.0023 ETH</p>
                                            </div>
                                            <div class="col-4 full_width col-md-3 d-flex align-items-center">
                                                <p class="light_para">2 Hours 2 min 30s</p>
                                            </div>
                                            <div
                                                class="col-4 full_width col-md-3 d-flex align-items-center justify-content-start justify-content-md-end">
                                                <p class="light_para">$200.9</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row py-3">
                        <div class="col-12">
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
                                                    <img src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=644&q=80"
                                                        alt="">
                                                </div>
                                                <p class="light_para ms-3">0.0023 ETH</p>
                                            </div>
                                            <div class="col-4 full_width col-md-3 d-flex align-items-center">
                                                <p class="light_para">3 Hours 20 min 25s</p>
                                            </div>
                                            <div
                                                class="col-4 full_width col-md-3 d-flex align-items-center justify-content-start justify-content-md-end">
                                                <p class="light_para">$200.9</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row py-3">
                        <div class="col-12">
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
                                                    <img src="https://images.unsplash.com/photo-1513956589380-bad6acb9b9d4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                                                        alt="">
                                                </div>
                                                <p class="light_para ms-3">0.0023 ETH</p>
                                            </div>
                                            <div class="col-4 full_width col-md-3 d-flex align-items-center">
                                                <p class="light_para">3 Hours 1 min 30s</p>
                                            </div>
                                            <div
                                                class="col-4 full_width col-md-3 d-flex align-items-center justify-content-start justify-content-md-end">
                                                <p class="light_para">$200.9</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row py-3">
                        <div class="col-12">
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
                                                    <img src="https://images.unsplash.com/photo-1514794749374-fb67509dbb7f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80"
                                                        alt="">
                                                </div>
                                                <p class="light_para ms-3">0.0023 ETH</p>
                                            </div>
                                            <div class="col-4 full_width col-md-3 d-flex align-items-center">
                                                <p class="light_para">5 Hours 17 min 10s</p>
                                            </div>
                                            <div
                                                class="col-4 full_width col-md-3 d-flex align-items-center justify-content-start justify-content-md-end">
                                                <p class="light_para">$200.9</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- bets section -->
    </main>

    <!-- Footer -->
    <footer class="footer side_padding second_footer">
        <!-- Footer -->
        <div class="container padding_one">
            <div class="row pt-4 justify-content-center">
                <div class="col-12 col-sm-6 col-md-4 col-lg-5">
                    <h1 class="text-white my-3"><?php echo getValuesByName("footer-heading") ?></h1>
                    <p class="light_para">
                        <?php echo getValuesByName("footer-content") ?>
                    </p>


                </div>

                <div class="col-12 col-sm-6 col-md-3 col-lg-2 mt-3 mt-md-0">
                    <h1 class="text-white my-3">USEFUL LINKS</h1>
                    <p class="light_para"><a href="./woWeare.php">Who are we?</a></p>
                    <p class="light_para"><a href="./howItWorks.php">How it works?</a></p>
                    <p class="light_para"><a href="./terms.php">Terms and Conditions</a></p>
                    <p class="light_para"><a href="./legal.php">Legal</a></p>
                </div>



                <div class="col-12 col-sm-6 col-md-4 col-lg-4 ms-lg-5 ms-md-0">
                    <h1 class="text-white my-3">NEWSLETTER</h1>

                    <!-- News letter section -->
                    <form action="./addNewsLetter.php" method="post">
                        <div class="newsLetter_search">
                            <input type="email" autocomplete="off" required name="email"
                                placeholder="Enter your email" />
                            <button style="border: none" type="submit" name="submit"
                                class="newlettButton">SUBSCRIBE</button>
                        </div>
                    </form>
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
                        <a href="./terms.php"> Terms of Use </a> and
                        <a href="./policy.php"> Privacy Policy </a>
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
    <script src="./assests/js/main.js"></script>
    <script src="./assests/js/alert.js"></script>
    <script src="./assests/js/auction.js"></script>
    <script>
    $('.slider').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 2,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    $('.slider2').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 2,
        slidesToScroll: 3,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    </script>
</body>

</html>