<?php
require_once "../model/general.php";

session_start();
$pageName = "General Details";

if (!isset($_SESSION['admin_email'])) {
	$_SESSION['toast']['msg'] = "Please, Log-in to continue.";
	header("location:login.php");
	exit();
}

function getGeneral()
{
	$general = new General();
	return $general;
}

function getValuesByName($name)
{
	$general =	getGeneral();
	$data = $general->getDataByName($name)[0];
	return $data["key_value"];
}

function uploadImage($fileObj)
{
	$fileType = strtolower(explode('/', $fileObj["type"])[1]);
	$exceptedTypes = array("jpg", "png", "jpeg");
	$uploadDir = "../media/";

	if (in_array($fileType, $exceptedTypes)) {
		$fileName = uniqid("", true) . "." . $fileType;
		$fileDestination = $uploadDir . $fileName;
		move_uploaded_file($fileObj["tmp_name"], $fileDestination);
		return $fileName;
	} else {
		throw new Exception("Unexpected file type");
	}
}
// update logo
if (isset($_POST['sub-logo'])) {
	$fileObj = $_FILES["logo"];
	$tmpName = $_FILES['logo']['tmp_name'];

	if (file_exists($tmpName)) {
		try {
			$filePath = uploadImage($fileObj);
		} catch (Exception $e) {
			$_SESSION['toast']['msg'] = "Upload only image format(jpg,jpeg,png).";
		}
		$general = getGeneral();
		$general->update(array("key_value" => $filePath), $_key = "logo");
	}
}

// //update favicon...
if (isset($_POST['sub-favicon'])) {
	$tmpName = $_FILES['favicon']['tmp_name'];
	$fileObj = $_FILES['favicon'];
	if (file_exists($tmpName)) {
		try {
			$filePath = uploadImage($fileObj);
		} catch (Exception $e) {
			$_SESSION['toast']['msg'] = "Upload only image format(jpg,jpeg,png).";
		}
		$general = getGeneral();
		$general->update(array("key_value" => $filePath), $_key = "favicon");
	}
}
// // general detail
if (isset($_POST['submit_general'])) {
	$site = $_POST['site'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$mailer = $_POST['mailer'];
	$address = $_POST['address'];
	$updatedData = array('website_name' => $site, "address"  => $address, 'phone_number' => $contact, 'email' => $email, 'mailer_email' => $mailer);
	$general = getGeneral();

	$general->update($updatedData);
	header("Location: general-detail.php");
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
                        <div class="col-lg-8 mx-auto mt-2">
                            <div class="card py-3 m-b-30">
                                <div class="card-body">
                                    <ul class="nav nav-tabs tab-line" id="myTab2" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab2" data-toggle="tab"
                                                href="#line-home" role="tab" aria-controls="home"
                                                aria-selected="true">Logo/Favicon</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link show" id="profile-tab2" data-toggle="tab"
                                                href="#line-profile" role="tab" aria-controls="profile"
                                                aria-selected="false">General Details</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent2">
                                        <div class="tab-pane fade show active" id="line-home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <form method="POST" enctype="multipart/form-data">
                                                <h3 class="text-center">Logo/Favicon</h3>
                                                <div class="form-row mb-3">
                                                    <img src="<?php echo "../media/" . getValuesByName("logo"); ?>"
                                                        class="img-circle img-responsive m-auto mx-2" alt="Logo"
                                                        height="100px;">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputlogo01"
                                                            name="logo">
                                                        <label class="custom-file-label" for="inputlogo01">Logo</label>
                                                    </div>
                                                </div>
                                                <div class="form-row mb-4">
                                                    <button type="submit" class="btn btn-success m-auto"
                                                        name="sub-logo">Save changes</button>
                                                </div>
                                            </form>
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="form-row mb-5">
                                                    <img src="<?php echo "../media/" . getValuesByName("favicon") ?>"
                                                        class="img-circle img-responsive m-auto mx-2" alt="Favicon"
                                                        height="100px;">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputllogo02"
                                                            name="favicon">
                                                        <label class="custom-file-label"
                                                            for="inputllogo02">Favicon</label>
                                                    </div>
                                                </div>
                                                <div class="form-row mb-4">
                                                    <button type="submit" class="btn btn-success m-auto"
                                                        name="sub-favicon">Save changes</button>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="tab-pane fade" id="line-profile" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            <form method="POST" enctype="multipart/form-data">
                                                <h3 class="text-center">General Details</h3>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-12">
                                                        <label for="sitename">Site Name</label>
                                                        <input type="type" class="form-control" id="sitename"
                                                            placeholder="Site Name" name="site"
                                                            value="<?php echo getValuesByName("website_name"); ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="contactinput">Contact Number</label>
                                                        <input type="type" class="form-control" id="contactinput"
                                                            placeholder="Number" name="contact"
                                                            value="<?php echo getValuesByName("phone_number"); ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputemail">Email</label>
                                                        <input type="email" class="form-control" id="inputemail"
                                                            placeholder="Email" name="email"
                                                            value="<?php echo getValuesByName("email"); ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="mailerinout">Mailer Mail</label>
                                                        <input type="email" class="form-control" id="mailerinout"
                                                            placeholder="Mailer Mail" name="mailer"
                                                            value="<?php echo getValuesByName("mailer_email"); ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="addinput">Address</label>
                                                        <input type="type" class="form-control" id="addinput"
                                                            placeholder="Address" name="address"
                                                            value="<?php echo getValuesByName("address"); ?>">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-cta"
                                                    name="submit_general">Save changes</button>
                                            </form>
                                        </div>

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