<?php
require_once "./session.php";
require_once "./model/authToken.php";
require_once "./model/users.php";
require_once "./sendEmail.php";

$pageName = "change-password";

if (!isset($_GET["token"])) {
    header("HTTP/1.0 404 Not Found");
    die();
}

$token = $_GET["token"];
$authToken = new AuthToken();
if ($authToken->varify($token)) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $tokenData = $authToken->read($token);
        $users = new Users();
        $usersData = $users->read($userEmail = $tokenData[0]['email']);
        $password = $_POST["password"];
        $conformPassword = $_POST["conform-password"];
        if ($password == $conformPassword) {
            $updatedData = array("password" => hash("sha512", $password));
            $users->update($updatedData, $usersData[0]["id"]);
            $authToken->delete($token);
            $_SESSION["flash"]["type"] = "success";
            $_SESSION["flash"]["message"] = "Your password in reset";
            sendEmail($usersData[0]["email"], "Your password is just changed!!");
            header("Location: ./logIn.php");
            die();
        } else {
            $_SESSION["flash"]["type"] = "warning";
            $_SESSION["flash"]["message"] = "Password dose not match";
            header("Refresh: 0");
            die();
        }
    }
} else {
    header('HTTP/1.0 403 Forbidden');
    die();
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
                            <h1>Forget Password</h1>
                            <p class="light_para my-3">Change your password</p>
                        </div>
                        <!-- Sing In Component content -->

                        <!-- Sing in input div -->
                        <div class="mt-4">
                            <form method="post">
                                <div class="sing_in_input_div d-flex align-items-center mb-4">
                                    <div class="sing_in_icons_div">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <input name="password" type="password" placeholder="Enter Password" />
                                </div>
                                <div class="sing_in_input_div d-flex align-items-center">
                                    <div class="sing_in_icons_div">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <input name="conform-password" type="password" placeholder="Conform Password" />
                                </div>

                                <!-- Forget Password -->
                                <div class="text-center mt-5 forgot_div">
                                    <a href="./logIn.php">Back to login</a>
                                    <div class="mt-4">
                                        <button type="submit" name="submit" class="logIn_button">Submit</button>
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
                        <h1 class="text-white">Forget your password?</h1>
                        <p class="text-white mb-4">Change your password by getting an email</p>
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