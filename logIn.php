<?php
require_once "./model/users.php";
require_once "./session.php";

$users = new Users();

if (isset($_SESSION["email"])) {
    header("Location: ./userProfile.php");
    die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = hash("sha512", $_POST['password']);
    $userData = $users->read($userEmail = $email)[0];

    if ($password === $userData["password"]) {
        $_SESSION["email"] = $userData["email"];
        $_SESSION["username"] = $userData["username"];
        $_SESSION["userId"] = $userData["id"];
        header("Location: ./userProfile.php");
    }
}
?>

<!-- Header -->
<?php require_once "./header.php" ?>
<!-- Main -->
<main>
    <!-- Sing Up Component -->
    <section class="SignIn_Div side_padding">
        <div class="container-fluid padding_one">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <!-- Sign In Div -->
                    <div class="sign_in_inner_div">
                        <!-- Sing In Component content -->
                        <div class="text-center">
                            <h1>HI, THERE</h1>
                            <p class="light_para my-3">You can log in to your account here.</p>
                        </div>
                        <!-- Sing In Component content -->

                        <!-- Sing in and log in buttons -->
                        <div class="login_buttons_div my-4 d-flex align-items-center justify-content-center">
                            <button class="log_with_facebook login_with_button">
                                <img src="./assests/icons&images/facebbok11.png" alt="" /> Log in with Facebook
                            </button>
                            <button class="log_with_google login_with_button"><img src="./assests/icons&images/g.png"
                                    alt="" /> Log
                                in with Google</button>
                        </div>
                        <!-- Sing in and log in buttons -->

                        <div class="d-flex mt-5 devide_div align-items-center justify-content-center">
                            <div class="line"></div>
                            <p>Or</p>
                            <div class="line"></div>
                        </div>

                        <!-- Sing in input div -->
                        <div class="mt-4">
                            <form method="post">
                                <div class="sing_in_input_div d-flex align-items-center mb-4">
                                    <div class="sing_in_icons_div">
                                        <img src="./assests/icons&images/Layer 2.svg" alt="" />
                                    </div>
                                    <input name="email" type="email" placeholder="Email Address" />
                                </div>
                                <div class="sing_in_input_div d-flex align-items-center">
                                    <div class="sing_in_icons_div">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <input name="password" type="password" placeholder="Email Password" />
                                </div>

                                <!-- Forget Password -->
                                <div class="text-center mt-5 forgot_div">
                                    <a href="#">Forgot Password?</a>
                                    <div class="mt-4">
                                        <button type="submit" class="logIn_button">LOG IN</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Sing in input div -->
                    </div>
                    <!-- Sign In Div -->
                </div>

                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <!-- Switch section -->
                    <div class="switch_section text-center">
                        <!-- Content -->
                        <h1 class="text-white">NEW HERE?</h1>
                        <p class="text-white mb-4">Sign up and create your Account</p>
                        <div>
                            <a class="logIn_button" href="./register.php">SIGN UP</a>
                        </div>
                        <!-- Content -->
                    </div>
                    <!-- Switch section -->
                </div>
            </div>
        </div>
    </section>
    <!-- Sing Up Component -->
</main>
<!-- Main -->

<!-- Footer -->
<footer class="footer second_footer">
    <!-- Footer -->
    <div class="container padding_one">
        <div class="row pt-4">
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <h1 class="text-white my-3">OUT STORE</h1>
                <p class="light_para">
                    Lorem ipsum, dolor sit amet consectetur adipisicing <br />
                    elit. Optio voluptatem qui magnam aliquid cum atque tempore quia? Quis, doloribus commodi.
                </p>

                <!-- Footer icons -->
                <div class="footer_icons">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-linkedin-in"></i>
                    <i class="fab fa-twitter"></i>
                </div>
                <!-- Footer icons -->
            </div>
            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                <h1 class="text-white my-3">My Account</h1>
                <p class="light_para"><a href="#">Sign In</a></p>
                <p class="light_para"><a href="#">View Cart</a></p>
                <p class="light_para"><a href="#">My Wishlist</a></p>
                <p class="light_para"><a href="#">Track My Order</a></p>
                <p class="light_para"><a href="#">Help</a></p>
            </div>

            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                <h1 class="text-white my-3">Information</h1>
                <p class="light_para"><a href="#">About Me</a></p>
                <p class="light_para"><a href="#">How to shop ?</a></p>
                <p class="light_para"><a href="#">FAQ</a></p>
                <p class="light_para"><a href="#">Contact Us</a></p>
                <p class="light_para"><a href="#">Log in</a></p>
            </div>

            <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                <h1 class="text-white my-3">Customer Service</h1>
                <p class="light_para"><a href="#">Payment Methods</a></p>
                <p class="light_para"><a href="#">Money-back gurantee</a></p>
                <p class="light_para"><a href="#">Return</a></p>
                <p class="light_para"><a href="#">Shipping</a></p>
                <p class="light_para"><a href="#">Terms and conditions</a></p>
                <p class="light_para"><a href="#">Privacy Prolicy</a></p>
            </div>
        </div>
    </div>
    <!-- Footer -->

    <!-- Footer Second -->
    <div class="container-fluid footer_second">
        <div class="row">
            <div class="d-flex justify-content-around py-3">
                <p class="light_para">Copyright © 2021 Molla Store. All Rights Reserved.</p>
                <p class="light_para">Terms Of Use Privacy Policy</p>
            </div>
        </div>
    </div>
    <!-- Footer Second -->
</footer>
<!-- Footer -->
</body>

</html>