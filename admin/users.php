<?php
include_once("../session.php");
require_once "../model/users.php";

$pageName = "Users";
$users = new Users();

$userData = $users->read();
if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
}

if (isset($_GET["id"]) && isset($_GET["status"]) && isset($_GET["params"])) {
    if ($_GET["params"] == "changeStatus") {
        $data = array("`status`" => $_GET["status"]);
        $users->update($data, $_GET["id"]);
        header("Location: ./users.php");
    }
}
// print_r($userData[0]["role"]);
// die();
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
                        <div class="col-lg-10 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" style="width: 100%">
                                            <thead>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>View Profile</th>
                                                <th>Status</th>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($userData); $i++) : ?>
                                                <?php if ($userData[$i]["role"] == "user") : ?>
                                                <tr>
                                                    <td><?php echo $i + 1 ?></td>
                                                    <td><?php echo $userData[$i]["username"] ?></td>
                                                    <td><?php echo $userData[$i]["email"] ?></td>
                                                    <td><?php echo $userData[$i]["contact"] ?></td>
                                                    <td><?php echo $userData[$i]["address"] ?></td>
                                                    <td><a
                                                            href="../profile.php?token=<?php echo $userData[$i]["token"] ?>">View
                                                            Profile</a></td>
                                                    <td>
                                                        <?php if ($userData[$i]["status"] == "active") : ?>
                                                        <a
                                                            href="./users.php?id=<?php echo $userData[$i]["id"] ?>&params=changeStatus&status=unactive">Unactive</a>
                                                    </td>
                                                    <?php else : ?>
                                                    <a
                                                        href="./users.php?id=<?php echo $userData[$i]["id"] ?>&params=changeStatus&status=active">Active</a>
                                                    </td>
                                                    <?php endif; ?>
                                                </tr>
                                                <?php endif; ?>
                                                <? endfor; ?>
                                            </tbody>
                                        </table>
                                    </div>
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