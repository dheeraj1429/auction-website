<?php
include_once("../session.php");
require_once("../model/contact.php");

$pageName = "Contact";

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
}

$contact = new Contact();

$contactData = $contact->read();
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
                                    <div class="table-container">
                                        <table class="table" style="width: 100%">
                                            <thead>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Message</th>
                                                <th>Reply</th>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($contactData); $i++) : ?>
                                                <tr>
                                                    <td><?php echo $i + 1 ?></td>
                                                    <td><?php echo $contactData[$i]['name'] ?></td>
                                                    <td><?php echo $contactData[$i]['email'] ?></td>
                                                    <td><?php echo $contactData[$i]['phone_number'] ?></td>
                                                    <td><?php echo $contactData[$i]['message'] ?></td>
                                                    <td>
                                                        <a href="./reply.php?reciver_email=<?php echo $contactData[$i]["email"] ?>"
                                                            type="button" class="btn btn-primary">Reply</a>
                                                    </td>
                                                </tr>
                                                <?php endfor; ?>
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