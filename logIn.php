<?php
require_once "./model/users.php";
require_once "./session.php";

$users = new Users();

if (isset($_SESSION["email"])) {
    header("Location: ./userProfile.php");
    die();
}

$pageName = "login";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
    $email = $_POST['email'];
    $password = hash("sha512", $_POST['password']);
    $userData = $users->read($userEmail = $email);

    if (!$userData) {
        $userData = null;
    } else {
        $userData = $userData[0];
    }

    if (!$userData) {
        $_SESSION["flash"]["message"] = "Invalid user";
        $_SESSION["flash"]["type"] = "danger";
        header("Refresh: 0");
        die();
    }
    if ($password === $userData["password"]) {
        $_SESSION["email"] = $userData["email"];
        $_SESSION["username"] = $userData["username"];
        $_SESSION["userId"] = $userData["id"];
        $_SESSION["token"] = $userData["token"];
        $_SESSION["flash"]["message"] = "Welcome, " . $userData["username"] . " :)";
        $_SESSION["flash"]["type"] = "success";
        header("Location: ./userProfile.php");
        die();
    } else {
        $_SESSION["flash"]["message"] = "Invalid password";
        $_SESSION["flash"]["type"] = "warning";
        header("Refresh: 0");
        die();
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
                                    <input name="password" type="password" placeholder="Enter Password" />
                                </div>

                                <!-- Forget Password -->
                                <div class="text-center mt-5 forgot_div">
                                    <a href="#">Forgot Password?</a>
                                    <div class="mt-4">
                                        <button type="submit" name="submit" class="logIn_button">LOG IN</button>
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
<?php require_once "./footer2.php" ?>