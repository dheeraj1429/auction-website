<?php
require_once "./getValuesByName.php";

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
    <link rel="stylesheet" href="./assests/style/responsive.css">
    <link rel="stylesheet" href="./assests/style/currentAuctions.css" />
    <link rel="stylesheet" href="./assests/style/winningPage.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="icon" href="<?php echo "./media/" . getValuesByName("favicon") ?>">
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