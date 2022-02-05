<?php
   require_once 'inc/config.php';

  $productname = $_POST['productid'];
  $userid = $_SESSION['user']['name'];
    $query = mysqli_query($conn ,"SELECT * FROM ".$tblPrefix."auctions WHERE id = $productname");
    $data = mysqli_fetch_assoc($query);
    $title = $data['name'];

    $insert = mysqli_query($conn ,"INSERT INTO ".$tblPrefix."bid(`userdata`, `amount`, `auction_id`,auction_name) VALUES ('$userid','100','$productname','$title')");
    if($query){
        echo 1;
    }

?>