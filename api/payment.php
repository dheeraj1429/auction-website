<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


if (isset($_GET["price"]) && isset($_GET["package_id"])) {

    $cofigFile = file_get_contents("paypal_config.json");
    $configData = json_decode($cofigFile, true);

    $client = $configData["client_id"];
    $secret = $configData["secret"];

    $paypalApi = "https://api-m.sandbox.paypal.com";


    $curl = curl_init($paypalApi . '/v1/payments/payment');

    $paymentData = array(
        "auth" => array(
            "user" => $client,
            "pass" => $secret
        ),
        "body" => array(
            "intent" => "sale",
            "payer" => array(
                "method" => "paypal"
            ),
            "transactions" => array(
                array(
                    "amount" => array(
                        "total" => $_GET["price"],
                        "currency" => "USD"
                    )
                )
            ),
            "redirect_urls" => array(
                "return_url" => "http://localhost/auction/checkout.php?package_id=" . $_GET["package_id"],
                "cancel_url" => "http://localhost/auction/checkout.php?package_id=" . $_GET["package_id"]
            )
        ),
        "json" => true
    );

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($paymentData));

    $response = json_decode(curl_exec($curl), true);
    print_r(json_encode($response));
    die();
    echo json_encode(array("id" => $response["id"]));
} else {
    header("HTTP/1.0 404 Not Found");
    die();
}