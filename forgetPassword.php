<?php
require_once "./session.php";
require_once "./sendEmail.php";
require_once "./model/authToken.php";
require_once "./model/users.php";

$pageName = "forget password";

function varifyEmail($email)
{
    $users = new Users();
    $usersData = $users->read($userEmail = $email);
    if ($usersData) {
        return true;
    }
    return false;
}

function getToken()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 20; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $email = $_POST["email"];
    if (varifyEmail($email)) {
        $token = getToken();
        $tokenData = array("token" => $token, "email" => $email);
        $authToken = new AuthToken();
        $authToken->create($tokenData);
        sendEmail($email, "
        Hi there,
        You can change your password by the click on this link -> http://localhost/auction/changePassword.php?token={$token}
        ");
        $_SESSION["flash"]["type"] = "success";
        $_SESSION["flash"]["message"] = "We just send you an email with Instructions to reset your password";
        header("Refresh: 0");
        die();
    }
}
?>

<?php require_once "./header.php" ?>
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
                                        <img src="./assests/icons&images/Layer 2.svg" alt="" />
                                    </div>
                                    <input name="email" type="email" placeholder="Email Address" />
                                </div>
                                <!-- Forget Password -->
                                <div class="text-center mt-5 forgot_div">
                                    <a href="./logIn.php">Back to login</a>
                                    <div class="mt-4">
                                        <button type="submit" name="submit" class="logIn_button">Continue</button>
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
<?php require_once "./footer2.php" ?>