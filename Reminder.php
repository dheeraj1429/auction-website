<?php
require_once 'inc/config.php';
$full = date('Y-m-d H:i');

$data = mysqli_query($conn, "SELECT ap.auction_id,ap. user_id as auctionParticipitant, us.name,us.email,ba.name, Date_Add(ba.starting_from , INTERVAL -2 MINUTE )FROM `bnmi_auction_participant` ap LEFT JOIN `bnmi_users` us ON ap.user_id = us.id LEFT JOIN `bnmi_auctions` ba ON ap.auction_id = ba.id Where Date_Add(ba.starting_from , INTERVAL -2 MINUTE ) = '$full' ");

$array = array();

while ($res = mysqli_fetch_assoc($data)){
    array_push($array,$res['email']);
}

    auctionMail($array,"Testing Mailer");

?>
