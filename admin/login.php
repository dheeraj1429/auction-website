<?php
// include_once("../inc/config.php");
require_once("../model/users.php");
require_once "../session.php";

$pageName = "Login";

if (isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['type'] = "success";
    $_SESSION['toast']['msg'] = "Logged in ";
    header("location: ./index.php");
    exit();
}

// Sign In
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $users = new Users();
    $userData = $users->read($email);
    if ($userData) {
        $userData = $userData[0];
    } else {
        $_SESSION['toast']['type'] = "danger";
        $_SESSION['toast']['msg'] = "Invalid users!!!";
        header("Refresh: 0");
        die();
    }
    // print_r($userData);
    // die();
    $hashPassword = $userData['password'];
    if (hash("sha512", $password . $users->hashKey) == $hashPassword && $userData['role'] == 'admin' || $userData['role'] == 'superadmin') {
        $_SESSION['admin_email'] = $email;
        $_SESSION["admin_name"] = $userData["username"];
        header("Location: ./");
        die();
    } else {
        $_SESSION['toast']['type'] = "danger";
        $_SESSION['toast']['msg'] = "Invalid password!!!";
        header("Refresh: 0");
        die();
    }
} else {
    if (!isset($_SESSION['toast']["msg"])) {
        $_SESSION['toast']['msg'] = 'Currently you are not registered with us, Or your account is deactivated. <br> Please contact to senior admin.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <?php include_once('inc/css.php'); ?>
    <title>Smart Auction</title>
</head>

<body class="sidebar-pinned ">
    <main class="admin-main p-0">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-4  bg-white">
                    <div class="row align-items-center m-h-100">
                        <div class="mx-auto col-md-8">
                            <div class="p-b-20 text-center">
                                <p>
                                    <img src="assets/img/logo.svg" width="80" alt="">
                                </p>
                                <p class="admin-brand-content">
                                    Smart Auction
                                </p>
                            </div>
                            <h3 class="text-center p-b-20 fw-400">Login</h3>
                            <form class="needs-validation" method="POST">
                                <div class="form-row">
                                    <div class="form-group floating-label col-md-12">
                                        <label>Email</label>
                                        <input type="email" required class="form-control" placeholder="Email"
                                            autocomplete="off" name="email">
                                    </div>
                                    <div class="form-group floating-label col-md-12">
                                        <label>Password</label>
                                        <input type="password" required class="form-control" autocomplete="off"
                                            placeholder="Password" name="password">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block btn-lg"
                                    name="login">Login</button>
                            </form>
                            <p class="text-right p-t-10">
                                <a href="#!" class="text-underline">Forgot Password?</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-none d-md-block bg-cover" style="background-image: url('assets/img/login.svg');">
                </div>
            </div>
        </div>
    </main>
</body>
<?php include_once('inc/js.php'); ?>
<?php include_once('inc/search-bar.php'); ?>

</html>