<?php
include_once("../session.php");
require_once "../model/auction.php";
require_once "../model/cronJobs.php";
require_once "../model/auctionCategory.php";

$pageName = "Add Auction";
date_default_timezone_set('Asia/Kolkata');

if (!isset($_SESSION['admin_email'])) {
    $_SESSION['toast']['msg'] = "Please, Log-in to continue.";
    header("location:login.php");
    exit();
}

$auction = new Auction();
$auctionCategory = new AuctionCategory();
$categories =  $auctionCategory->read();
if (isset($_GET["id"])) {
    $dataB = $auction->read($id = $_GET["id"])[0];
}
function uploadImage($fileObj)
{
    $fileType = strtolower(explode('/', $fileObj["type"])[1]);
    $exceptedTypes = array("jpg", "png", "jpeg");
    $uploadDir = "../media/img/product/";

    if (in_array($fileType, $exceptedTypes)) {
        $fileName = uniqid("", true) . "." . $fileType;
        $fileDestination = $uploadDir . $fileName;
        move_uploaded_file($fileObj["tmp_name"], $fileDestination);
        return $fileName;
    } else {
        throw new Exception("Unexpected file type");
    }
}

function addCron($date, $time, $token)
{
    $file = fopen("../cronFile.txt", "a");
    $cronJobs = new CronJobs();
    $cronJobs->create(array("date" => $date, "time" => $time, "token" => $token));
    $dateData = explode("-", $date);
    $timeData = explode(":", $time);
    $day = $dateData[2];
    $month = $dateData[1];
    $hour = $timeData[0];
    $minute = $timeData[1];

    $text = "$minute $hour $day $month * wget -O /dev/null 'http://localhost/auction/auctionJob.php?token=$token'\n";
    fwrite($file, $text);
    shell_exec("php /opt/lampp/htdocs/auction/addCron.php");
}

function updateCron($date, $time, $token)
{
    $cronJobs = new CronJobs();
    $cronJobs->update(array("date" => $date, "time" => $time), $token);
    $cronData = $cronJobs->read();
    $text = "";
    foreach ($cronData as $d) {
        $dateData = explode("-", $d['date']);
        $timeData = explode(":", $d['time']);
        $token = $d['token'];

        $day = $dateData[2];
        $month = $dateData[1];
        $hour = $timeData[0];
        $minute = $timeData[1];

        $cronText = "$minute $hour $day $month * wget -O /dev/null 'http://localhost/auction/auctionJob.php?token=$token'\n";
        $text .= $cronText;
    }
    $file = fopen("../cronFile.txt", "w");
    fwrite($file, $text);
    shell_exec("php /opt/lampp/htdocs/auction/addCron.php");
    fclose($file);
}

function validateAuction($date, $time)
{
    $auction = new Auction();
    $data = $auction->getAuctionByDateAndTime($date, $time);
    if ($data) {
        return false;
    }
    return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['product_name'];
    $startingPrice = $_POST['starting_price'];
    $storePrice = $_POST['store_price'];
    $feature = $_POST['feature'];
    $capacity = $_POST['capacity'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $isVip = $_POST['is_vip'];
    $category = $_POST['category'];
    $discription = htmlspecialchars($_POST['discription']);
    $currentTime = strtotime(date("H:i:s"));
    $currentDate = strtotime(date("Y-m-d"));
    $image = $_FILES['image'];
    $token = (!isset($_GET["id"])) ? $auction->generateToken() : $dataB["token"];

    if ($currentTime >= strtotime($time) || $currentDate > strtotime($date)) {
        $_SESSION["toast"]["msg"] = "Invalid date time";
        header("Refresh: 0");
        die();
    }
    if (!validateAuction($date, $time)) {
        $_SESSION["toast"]["msg"] = "You already have a auction on same date and time.";
        header("Refresh: 0");
        die();
    }

    if ($capacity < 3) {
        $_SESSION["toast"]["msg"] = "Capacity need to be grater than or equal to 3";
        header("Refresh: 0");
        die();
    }
    if (isset($_GET['id'])) {
        if ($image["size"] !== 0) {
            $fileName = uploadImage($image);
        } else {
            $fileName = null;
        }
    } else {
        $fileName = uploadImage($image);
    }

    if ($fileName) {
        $data = array(
            "product_name" => $productName,
            "capacity" => $capacity,
            "date" => $date,
            "time" => $time,
            "featured_status" => $feature,
            "starting_price" => $startingPrice,
            "category" => $category,
            "discription" => $discription,
            "store_price" => $storePrice,
            "product_img" => $fileName,
            "token"  => $token,
            "isVip" => $isVip
        );
    } else {
        $data = array(
            "product_name" => $productName,
            "capacity" => $capacity,
            "date" => $date,
            "time" => $time,
            "featured_status" => $feature,
            "starting_price" => $startingPrice,
            "category" => $category,
            "discription" => $discription,
            "store_price" => $storePrice,
            "token"  => $token,
            "isVip" => $isVip
        );
    }
    if (isset($_GET['id'])) {
        unset($data["token"]);
        $endTime = strtotime("+20 minutes", strtotime($time));
        $data["end_time"] = date('H:i', $endTime);
        $auction->update($data, $_GET["id"]);
        updateCron($date, $time, $token);
        $_SESSION["toast"]["msg"] = "Successfully updated";
        header("Location: ./addAuction.php");
        die();
    } else {
        $auction->create($data);
    }
    addCron($date, $time, $token);
    $_SESSION["toast"]["msg"] = "Successfully created";
    header("Refresh: 0");
    die();
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
                        <div class="col-lg-10 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <h3 class="card-title text-center"><?php echo $pageName; ?></h3>
                                    <div class="col-lg-12 mb-3">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-group col-md-12">
                                                <label for="product_name">Product Name</label>
                                                <input type="text" class="form-control" id="product_name"
                                                    placeholder="Product Name"
                                                    value="<?php if (isset($_GET['id'])) {
                                                                                                                                                echo $dataB['product_name'];
                                                                                                                                            } ?>"
                                                    name="product_name" autocomplete="off" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="head">Auction Category</label>
                                                <select class="form-control" name="category" autocomplete="off"
                                                    required="">
                                                    <option value="" selected="" disabled="">Select Category</option>
                                                    <?php foreach ($categories as $category) : ?>
                                                    <?php if (isset($_GET["id"])) : ?>
                                                    <?php if ($dataB["category"] == $category["id"]) : ?>
                                                    <option selected="" value="<?php echo $category["id"] ?>">
                                                        <?php echo $category["name"] ?></option>
                                                    <?php else : ?>
                                                    <option value="<?php echo $category["id"] ?>">
                                                        <?php echo $category["name"] ?></option>
                                                    <?php endif; ?>
                                                    <?php else : ?>
                                                    <option value="<?php echo $category["id"] ?>">
                                                        <?php echo $category["name"] ?></option>
                                                    <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="head">Is Vip</label>
                                                <select class="form-control" name="is_vip" autocomplete="off"
                                                    required="">
                                                    <?php if (isset($_GET["id"])) : ?>
                                                    <?php if ($dataB["isVip"] == "1") : ?>
                                                    <option selected="" value="1">True</option>
                                                    <option value="0">False</option>
                                                    <?php elseif ($dataB["isVip"] == "0") : ?>
                                                    <option value="1">True</option>
                                                    <option selected="" value="0">False</option>
                                                    <?php endif; ?>
                                                    <?php else : ?>
                                                    <option value="" selected="" disabled="">Select</option>
                                                    <option value="1">True</option>
                                                    <option value="0">False</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="head">Auction Feature</label>
                                                <select class="form-control" name="feature" autocomplete="off"
                                                    required="">
                                                    <?php if (isset($_GET["id"])) : ?>
                                                    <?php if ($dataB["featured_status"] == "featured") : ?>
                                                    <option selected="" value="featured">Featured</option>
                                                    <option value="deal_of_the_day">Deal of the Day</option>
                                                    <option value="popular-auction">Popular</option>
                                                    <?php elseif ($dataB["featured_status"] == "deal_of_the_day") : ?>
                                                    <option value="featured">Featured</option>
                                                    <option selected="" value="deal_of_the_day">Deal of the Day</option>
                                                    <option value="popular-auction">Popular</option>
                                                    <?php elseif ($dataB["featured_status"] == "popular-auction") : ?>
                                                    <option value="featured">Featured</option>
                                                    <option value="deal_of_the_day">Deal of the Day</option>
                                                    <option selected="" value="popular-auction">Popular</option>
                                                    <?php endif; ?>
                                                    <?php else : ?>
                                                    <option value="" selected="" disabled="">Select Feature</option>
                                                    <option value="featured">Featured</option>
                                                    <option value="deal_of_the_day">Deal of the Day</option>
                                                    <option value="popular-auction">Popular</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="starting_price">Starting Price</label>
                                                <input type="number" class="form-control" id="starting_price"
                                                    placeholder="Starting Price"
                                                    value="<?php if (isset($_GET['id'])) {
                                                                                                                                                        echo $dataB['starting_price'];
                                                                                                                                                    } ?>"
                                                    name="starting_price" autocomplete="off" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="store_price">Store Price</label>
                                                <input type="number" class="form-control" id="store_price"
                                                    placeholder="Store Price"
                                                    value="<?php if (isset($_GET['id'])) {
                                                                                                                                                echo $dataB['store_price'];
                                                                                                                                            } ?>"
                                                    name="store_price" autocomplete="off" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="capacity">Capacity</label>
                                                <input type="number" class="form-control" id="capacity"
                                                    placeholder="Capacity"
                                                    value="<?php if (isset($_GET['id'])) {
                                                                                                                                            echo $dataB['capacity'];
                                                                                                                                        } ?>"
                                                    name="capacity" autocomplete="off" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="date">Date</label>
                                                <input type="date" class="form-control" id="date"
                                                    placeholder="Auction Date"
                                                    value="<?php if (isset($_GET['id'])) {
                                                                                                                                        echo $dataB['date'];
                                                                                                                                    } ?>"
                                                    name="date" autocomplete="off" required="">
                                                <label for="time">Time</label>
                                                <input type="time" class="form-control" id="time"
                                                    placeholder="Auction Time"
                                                    value="<?php if (isset($_GET['id'])) {
                                                                                                                                        echo $dataB['time'];
                                                                                                                                    } ?>"
                                                    name="time" autocomplete="off" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="custom-file mt-3">
                                                    <input type="file" class="custom-file-input" id="inputllogo02"
                                                        name="image">
                                                    <label class="custom-file-label" for="inputllogo02">Image</label>
                                                </div>
                                                <?php if (isset($_GET['id'])) { ?>
                                                <img src="<?php if (isset($_GET['id'])) {
                                                                    echo "../media/img/product/" . $dataB['product_img'];
                                                                } ?>" class="img-circle img-responsive m-auto mx-2"
                                                    alt="<?php if (isset($_GET['id'])) {
                                                                                                                                echo $dataB['product_name'];
                                                                                                                            } ?>"
                                                    height="100px;">
                                                <?php } ?>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="discription">Discription</label>
                                                <textarea class="form-control" name="discription" id="discription"
                                                    rows="3">
                                                    <?php
                                                    if (isset($_GET['id'])) {
                                                        echo $dataB["discription"];
                                                    }
                                                    ?>
                                                </textarea>
                                            </div>
                                            <div class="form-row pt-3">
                                                <div class="form-group col-md-12">
                                                    <button type="submit" class="btn btn-success m-auto"
                                                        name="submit">Save changes</button>
                                                </div>
                                            </div>
                                        </form>
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