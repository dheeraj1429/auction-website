<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once "./model/tranction.php";

$entityBody = file_get_contents('php://input');
$data = json_decode($entityBody, true);
$paymentData = array(
    "user_id" => $data["user_id"],
    "payerId" => $data["payerID"],
    "orderId" => $data["orderID"],
    "status" => $data["status"],
    "package_id" => $data["package_id"]
);
$transaction = new Transaction();
$transaction->create($paymentData);
echo json_encode(array("isComplete" => true));
// print_r($data);