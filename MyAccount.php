<?php
require_once "./session.php";
require_once "./model/users.php";

if (!isset($_SESSION['email'])) {
    header("Location: ./logIn.php");
    die();
}
$users = new Users();

function uploadImage($fileObj)
{
    $fileType = strtolower(explode('/', $fileObj["type"])[1]);
    $exceptedTypes = array("jpg", "png", "jpeg");
    $uploadDir = "./media/img/users/";

    if (in_array($fileType, $exceptedTypes)) {
        $fileName = uniqid("", true) . "." . $fileType;
        $fileDestination = $uploadDir . $fileName;
        move_uploaded_file($fileObj["tmp_name"], $fileDestination);
        return $fileName;
    } else {
        throw new Exception("Unexpected file type");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $username = $_POST["username"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $file = $_FILES["image"];

    if ($file["size"] !== 0) {
        $fileName = uploadImage($file);
    } else {
        $fileName = null;
    }


    $updatedData = ($fileName) ? array(
        "username" => $username,
        "address" => $address,
        "contact" => $contact,
        "profile_img" => $fileName
    ) : array(
        "username" => $username,
        "address" => $address,
        "contact" => $contact,
    );

    $users->update($updatedData, $_SESSION["userId"]);
    header("Refresh: 0");
}
$pageName = "My Account";
$userData = $users->read($userEmail = $_SESSION["email"])[0];
?>
<?php require_once "./header.php" ?>
<!-- Header -->

<!-- main -->
<main>
    <!-- Banner section -->
    <section class="Banner_Section_div">
        <h1 class="text-white banner_heading">MY <span>ACCOUNT</span></h1>
    </section>
    <!-- Banner section -->

    <!-- My Account Setting -->
    <section class="MyAccount_Section padding_one">
        <div class="container-fluid side_padding">
            <div class="row pb-5 pt-4">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <!-- My Account Setting -->
                    <div class="row">
                        <div class="col-12">
                            <div class="hot_it_works_heading py-3">
                                <h1>MY ACCOUNT <span class="span_color_2">SETTINGS</span></h1>
                                <div class="line_div ms-0 my-4"></div>
                            </div>
                        </div>
                    </div>
                    <!-- My Account Setting -->

                    <div class="row">
                        <div class="col-12 myAccountOptionNum col-sm-12 col-md-6 col-lg-6">
                            <p>Number of tokens purchased</p>
                            <input type="text" style="color: white" class="NumberInputDis"
                                value="<?php echo $userData["bid_token"] ?>" placeholder="Bid Token" disabled />
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-md-6 col-lg-6">
                            <div class="col-12 myAccountOptionNum col-sm-12 mt-4 mt-md-0">
                                <p>Number of vip tokens purchased</p>
                                <input type="text" style="color: white" class="NumberInputDis"
                                    value="<?php echo $userData["vip_token"] ?>" placeholder="Vip token" disabled />
                            </div>
                        </div>
                    </div>

                    <form method="post" enctype="multipart/form-data">
                        <div class="row mt-4">
                            <div class="col-12 myAccountOption col-sm-12 col-md-6 col-lg-6">
                                <p>Username (*)</p>
                                <input value="<?php echo $userData["username"] ?>" name="username" type="text"
                                    placeholder="Your name" />
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 col-sm-12 col-md-6 col-md-6 col-lg-6 mt-4 mt-md-0">
                                <div class="col-12 myAccountOption col-sm-12">
                                    <p>E-mail (*)</p>
                                    <input value="<?php echo $userData["email"] ?>" type="text"
                                        placeholder="Your email address" disabled />
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 myAccountOption col-sm-12 col-md-6 col-lg-6">
                                <p>Telephone number (*)</p>
                                <input type="tel" name="contact" value="<?php echo $userData["contact"] ?>"
                                    placeholder="Telephone number" />
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-md-6 col-lg-6 mt-4 mt-md-0">
                                <div class="col-12 myAccountOption col-sm-12">
                                    <p>Address (*)</p>
                                    <input type="text" name="address" value="<?php echo $userData["address"] ?>"
                                        placeholder="<?php echo $userData["address"] ?>" />
                                </div>
                            </div>
                            <div style="margin-top: 20px">
                                <div>
                                    <p>Update Profile Img</p>
                                    <input type="file" name="image" />
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary"
                            style="margin: 20px 0px; background-color: var(--LightRedColor); border: 1px solid var(--LightRedColor)">Save
                            Changes</button>
                    </form>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4"></div>
            </div>
        </div>
    </section>
    <!-- My Account Setting -->
</main>
<!-- main -->

<!-- Footer -->
<?php require_once "./footer2.php" ?>