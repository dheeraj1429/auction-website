<header>
    <!-- Top Header -->
    <div class="Top_Header">
        <div class="Top_Header_Inner container-fluid side_padding">
            <div class="Top_Navbar_Inner_Sm_div">
                <i class="fas fa-envelope" class="img-fluid"></i>
                <p class="text-white"><?php echo getGeneral('email');?></p>
            </div>

            <!-- Top navbar icons -->
            <div class="Top_Navbar_Inner_Sm_div">
              <a href="<?php echo getGeneral('facebook'); ?>" target="_blank">
              <i class="fab fa-facebook-f"></i>
              </a>
              <a href="<?php echo getGeneral('instagram'); ?>" target="_blank">
              <i class="fab fa-instagram"></i>
              </a>
              <a href="<?php echo getGeneral('linkedin'); ?>" target="_blank">
              <i class="fab fa-linkedin-in"></i>
              </a>
              <a href="<?php echo getGeneral('twitter'); ?>" target="_blank">
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
            <nav class="navbar navbar-expand-xxl navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="./index.php">
                        <img src="assets/img/<?php echo getGeneral('logo');?>" alt="<?php echo SITE_NAME?>" style="height:100px;">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon" class="img-fluid"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./index.php">HOME</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./howItWorks.php">HOW IT
                                    WORKS</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active active_header" aria-current="page"
                                    href="./Ended.php">ENDED AUCTIONS</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./currentAuctions.php">CURRENT
                                    AUCTIONS</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./contact.php">CONTACT</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./Buy_token.php">BUY
                                    TOKENS</a>
                            </li>
                            <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./MyAccount.php">AALBOUCHI</a>
            </li> -->

                            <li class="nav-item">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle drop" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        AALBOUCHI
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item" href="./MyAccount.php">My Account</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Sign Out</a></li>
                                    </ul>
                                </div>
                            </li>

                            <div class="sign_in_button d-flex align-items-center ms-5">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="./logIn.php">LOG IN</a>
                                </li>
                                <a class="Subcribe_button_sm text-white" href="./register.php">REGISTER
                                </a>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Main-Navbar -->
</header>