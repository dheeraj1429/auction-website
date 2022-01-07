<?php
include_once("../session.php");
require_once "../const.php";
require_once "../sendEmail.php";
$pageName = "Reply";

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
}

function send_email($reciverEmail, $message)
{
    if (PROD === 0) {
        $file = fopen("message.html", "w");
        $txt = "
            <h1>to: '$reciverEmail'</h1>
            <p>'$message'</p>
        ";
        fwrite($file, $txt);
        fclose($file);
    } else if (PROD === 1) {
        sendEmail($reciverEmail, $message);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reciverEmail = $_POST["reciver_email"];
    $message = htmlspecialchars($_POST['message']);
    send_email($reciverEmail, $message);
    header("Refresh: 0");
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <?php include_once('inc/css.php'); ?>
    <title><?php echo $pageName . " | " . "Smart Auction" ?></title>
</head>

<body class="sidebar-pinned ">
    <?php include_once('inc/sidebar.php'); ?>
    <main class="admin-main">
        <?php include_once('inc/nav.php'); ?>
        <section class="admin-content ">
            <?php include_once("inc/breadcrum.php"); ?>
            <section class="pull-up">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-8 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="reciver">Reciver Email</label>
                                            <input id="reciver" name="reciver_email" value="<?php echo $_GET['reciver_email']; ?>" class="form-control" type="text" placeholder="<?php echo $_GET["reciver_email"] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <lable for="message">Message</lable>
                                            <textarea name="message" class="form-control" id="messag " rows="3"></textarea>
                                        </div>
                                        <div class="form-row pt-3">
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-success m-auto" name="submit">Send</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

</body>
<?php include_once('inc/js.php'); ?>
<?php include_once('inc/search-bar.php'); ?>

</html>