<?php
require_once 'inc/config.php';
$today =  date('Y-m-d ');

$data = mysqli_query($conn, "SELECT  ap.auction_id,ap. user_id as auctionParticipitant, us.name,us.email,ba.name,ba.starting_from  FROM `bnmi_auction_participant` ap LEFT JOIN  `bnmi_users`  us  ON  ap.user_id = us.id  LEFT JOIN   `bnmi_auctions` ba ON ap.auction_id  = ba.id ");



while ($res = mysqli_fetch_assoc($data)) {

// print_r($res);

    $date = $res['starting_from'];

    
    $convertedTime = date('Y-m-d H:i:s', strtotime('-15 minutes', strtotime($date)));


    $time_exc = mysqli_query($conn, "SELECT  ap.auction_id,ap. user_id as auctionParticipitant, us.name,us.email,ba.name,ba.starting_from  FROM `bnmi_auction_participant` ap LEFT JOIN  `bnmi_users`  us  ON  ap.user_id = us.id  LEFT JOIN   `bnmi_auctions` ba ON ap.auction_id  = ba.id  where   ba.starting_from = '$date ' ");


while ($result = mysqli_fetch_assoc($time_exc )) {
print_r($result);

}

    echo '<br>';

    $today = date('Y-m-d ');



    //  echo "SELECT DATE_ADD(date_time, INTERVAL -15 MINUTE) FROM bnmi_auction_participant WHERE  date_time =$today";



}


// Data Print 




// echo "<pre/>";
// while ($da =  mysqli_fetch_assoc($data)) {
//     print_r($da);
?>
