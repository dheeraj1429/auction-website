<?php
require_once "./model/bids.php";



$bids = new Bids();

$data = $bids->getOldBid(5, 8);

if (!$data) {
    echo "working";
} else {
    print_r($data);
}