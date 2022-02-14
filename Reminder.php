<?php
require_once 'inc/config.php';
include "./simple.php";
$full = date('Y-m-d H:i');

$data = mysqli_query($conn, "SELECT ap.auction_id,ap. user_id as auctionParticipitant, us.name,us.email,ba.name, Date_Add(ba.starting_from , INTERVAL -10 MINUTE )FROM `bnmi_auction_participant` ap LEFT JOIN `bnmi_users` us ON ap.user_id = us.id LEFT JOIN `bnmi_auctions` ba ON ap.auction_id = ba.id Where Date_Add(ba.starting_from , INTERVAL -10 MINUTE ) = '$full' ");

$queryCards = mysqli_query($conn, "SELECT `id`, `name`, `image`, `store_price`, `starting_price`, `starting_from`, `capacity` FROM `" . $tblPrefix . "auctions` WHERE status = 2 AND  starting_from = '$full' ");

echo "SELECT ap.auction_id,ap. user_id as auctionParticipitant, us.name,us.email,ba.name, Date_Add(ba.starting_from , INTERVAL -10 MINUTE )FROM `bnmi_auction_participant` ap LEFT JOIN `bnmi_users` us ON ap.user_id = us.id LEFT JOIN `bnmi_auctions` ba ON ap.auction_id = ba.id Where Date_Add(ba.starting_from , INTERVAL -10 MINUTE ) = '$full'";
// echo "SELECT `id`, `name`, `image`, `store_price`, `starting_price`, `starting_from`, `capacity` FROM `".$tblPrefix."auctions` WHERE status = 2 AND  starting_from = '$full' " ;

$array = array();
while ($res = mysqli_fetch_assoc($data)) {
    array_push($array, $res['email']);
    print_r($res);

   
    
}

foreach ($array as $value) {
  
    $subject1 = "Test Mail Auction Url";
$message1 = "Auction You Participated in Will be starting in 10 mins. Hurry up and join by clicking the below Link <a href='#' target='_blank'>Join Here</a>";
smtp_mailer($value,$subject1,$message1);
  }


// $subject1 = "Test Mail Auction Url";
// $message1 = "Auction You Participated in Will be starting in 10 mins. Hurry up and join by clicking the below Link <a href='#' target='_blank'>Join Here</a>";
// smtp_mailer($res['email'],$subject1,$message1);
// print_r($array);


while ($postpond = mysqli_fetch_assoc($queryCards)) {
    print_r($postpond);

    $auctionName = $postpond['name'];

    echo $auctionName;

    $usersJoined = getUsersJoined($postpond['id']);
    $totalUsers = $postpond['capacity'];
    echo $percentage = ($usersJoined / $totalUsers) * 100;


    if ($percentage <  50) {

        $incdate =  date('Y-m-d H:i:s', strtotime('+1 week', strtotime($postpond['starting_from'])));
        $update =  mysqli_query($conn, "UPDATE  bnmi_auctions  SET starting_from ='$incdate'   WHERE `bnmi_auctions`.`name` = '$auctionName' ");

        if ($update) {
            $subject2 = "Test Mail AUction Postpond";
            $message2 = "Auction You Participated is postpond till ".$incdate." beacause of insuficient members in auction room.";
            foreach ($array as $post) {

                $subject1 = "Test Mail Auction Url";
            $message1 = "Auction You Participated in Will be starting in 10 mins. Hurry up and join by clicking the below Link <a href='#' target='_blank'>Join Here</a>";
            smtp_mailer($post,$subject1,$message1);
              }
        }
    }
}
