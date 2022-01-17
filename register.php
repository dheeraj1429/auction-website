<?php
require_once "./model/users.php";

$users = new Users();

if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST["submit"])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conformPassword = $_POST['conform-password'];
    $phoneNumber = $_POST['phone-number'];
    $address = $_POST['address'];

    if ($password === $conformPassword) {
        $data = array(
            "username" => $username,
            "email" => $email,
            "password" => $password,
            "contact" => $phoneNumber,
            "address" => $address,
            "role" => "user",
            "status" => "active"
        );
        $users->create($data);
        $_SESSION["flash"]["message"] = "Successfully created your now you're able to login";
        $_SESSION["flash"]["type"] = "success";
        header("Location: ./logIn.php");
    } else {
        $_SESSION["flash"]["message"] = "Password dose not match";
        $_SESSION["flash"]["type"] = "danger";
        header("Refresh: 0");
        die();
    }
}

?>
<?php if (isset($_SESSION["flash"])) : ?>
<div class="alert alert-<?php echo $_SESSION["flash"]["type"] ?>" role="alert">
    <?php echo $_SESSION["flash"]["message"] ?>
</div>
<?php endif; ?>
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
                            <p class="light_para my-3">Create Your Account</p>
                        </div>
                        <!-- Sing In Component content -->

                        <!-- Sing in and log in buttons -->

                        <div class="d-flex mt-5 devide_div align-items-center justify-content-center">
                            <div class="line"></div>
                            <p>Or</p>
                            <div class="line"></div>
                        </div>

                        <!-- Sing in input div -->
                        <form method="post">
                            <div class="mt-4">
                                <div class="sing_in_input_div d-flex align-items-center mb-4">
                                    <div class="sing_in_icons_div">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <input type="text" name="username" placeholder="Enter your name" />
                                </div>

                                <div class="sing_in_input_div d-flex align-items-center mb-4">
                                    <div class="sing_in_icons_div">
                                        <img src="./assests/icons&images/Layer 2.svg" alt="" />
                                    </div>
                                    <input name="email" type="email" placeholder="Email Address" />
                                </div>

                                <div class="sing_in_input_div d-flex align-items-center mb-4">
                                    <div class="sing_in_icons_div">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <input name="password" type="password" placeholder="Enter your Password" />
                                </div>

                                <div class="sing_in_input_div d-flex align-items-center">
                                    <div class="sing_in_icons_div">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <input name="conform-password" type="password" placeholder="Conform Password" />
                                </div>

                                <div class="sing_in_input_div d-flex align-items-center my-4">
                                    <div class="sing_in_icons_div">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <input name="phone-number" type="tel" placeholder="Phone number" />
                                </div>

                                <div class="sing_in_input_div d-flex align-items-center">
                                    <div class="sing_in_icons_div">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <input name="address" type="text" placeholder="address" />
                                </div>

                                <!-- Forget Password -->
                                <div class="text-center mt-5 forgot_div">
                                    <!-- <a href="#">Forgot Password?</a> -->
                                    <div class="mt-4">
                                        <button type="submit" name="submit" class="logIn_button">REGISTER</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Sing in input div -->
                    </div>
                    <!-- Sign In Div -->
                </div>

                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <!-- Switch section -->
                    <div class="switch_section text-center">
                        <!-- Content -->
                        <h1 class="text-white">Already have an account?</h1>
                        <p class="text-white mb-4">Log in your account</p>
                        <div>
                            <a class="logIn_button" href="./logIn.html">LOG IN</a>
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