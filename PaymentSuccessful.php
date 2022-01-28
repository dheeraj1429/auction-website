<?php
require_once "./session.php";
require_once "./model/package.php";
require_once "./model/users.php";

if (!isset($_SESSION["userId"])) {
  header("Location: ./logIn.php");
  die();
}
$pageName = "payement-successfull";

if (!isset($_GET["package_id"])) {
  header("Location: ./index.php");
  die();
}

$package = new Package();
$users = new Users();
$packageData = $package->read($id = $_GET["package_id"])[0];
$userData = $users->getUserById($_SESSION["userId"]);
?>
<?php require_once "./header.php"; ?>
<!-- Header -->

<!-- main -->
<main>
    <section class="payment_successful">
        <div class="container padding_Two">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-6 d-flex align-items-center justify-content-center">
                    <div class="paymentCard text-center px-4">
                        <img src="https://i.pinimg.com/originals/35/f3/23/35f323bc5b41dc4269001529e3ff1278.gif"
                            class="img-fluid" alt="">

                        <h4>Payment Successful</h4>

                        <div class="payment_content py-5">
                            <div class="row mb-3">
                                <div
                                    class="col-12 d-flex justify-content-sm-start justify-content-center col-sm-6 col-md-6">
                                    <h4>Payment Type</h4>
                                </div>
                                <div
                                    class="col-12 d-flex justify-content-center  justify-content-sm-end mt-2 mt-sm-0 col-sm-6 col-md-6">
                                    <h5>Net Banking</h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div
                                    class="col-12 d-flex justify-content-sm-start justify-content-center col-sm-6 col-md-6">
                                    <h4>Token Buy</h4>
                                </div>
                                <div
                                    class="col-12 d-flex justify-content-center  justify-content-sm-end mt-2 mt-sm-0 col-sm-6 col-md-6">
                                    <h5><?php echo $packageData["clicks"] ?></h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div
                                    class="col-12 d-flex justify-content-sm-start justify-content-center col-sm-6 col-md-6">
                                    <h4>Contact No.</h4>
                                </div>
                                <div
                                    class="col-12 d-flex justify-content-center  justify-content-sm-end mt-2 mt-sm-0 col-sm-6 col-md-6">
                                    <h5><?php echo $userData["contact"] ?></h5>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div
                                    class="col-12 d-flex justify-content-sm-start justify-content-center col-sm-6 col-md-6">
                                    <h4>Email</h4>
                                </div>
                                <div
                                    class="col-12 d-flex justify-content-center  justify-content-sm-end mt-2 mt-sm-0 col-sm-6 col-md-6">
                                    <h5><?php echo $userData["email"] ?></h5>
                                </div>
                            </div>

                            <div class="row mt-4 mb-4 amountPaid">
                                <div
                                    class="col-12 d-flex justify-content-sm-start justify-content-center col-sm-6 col-md-6">
                                    <h4>Amount Paid</h4>
                                </div>
                                <div
                                    class="col-12 d-flex justify-content-center  justify-content-sm-end mt-2 mt-sm-0 col-sm-12 col-md-6">
                                    <h5>$<?php echo $packageData["price"] ?></h5>
                                </div>
                            </div>

                            <!-- <div class="row mb-3">
                                <div
                                    class="col-12 d-flex justify-content-sm-start justify-content-center col-sm-6 col-md-6">
                                    <h4>Transaction id</h4>
                                </div>
                                <div
                                    class="col-12 d-flex justify-content-center  justify-content-sm-end mt-2 mt-sm-0 col-sm-6 col-md-6">
                                    <h5>1233412344123</h5>
                                </div>
                            </div> -->

                            <!-- <div class="row mt-0 mt-sm-5">
                                <div
                                    class="col-12 d-flex justify-content-center  justify-content-sm-end mt-2 mt-sm-0  col-sm-6">
                                    <button class="print">PRINT</button>
                                </div>
                                <div
                                    class="col-12 d-flex justify-content-sm-start justify-content-center mt-4 mt-sm-0 col-sm-6">
                                    <button class="print">CLOSE</button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- main -->
<?php require_once "./footer2.php" ?>