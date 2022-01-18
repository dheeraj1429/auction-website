<?php
require_once "./model/functions.php";
require_once "./model/auctionCategory.php";

function isParticepeted($email, $auctionId)
{
    $participant = new Participant();
    $participants = $participant->getParticipant($email, $auctionId);
    if (empty($participants)) {
        return false;
    } else {
        return true;
    }
}

function getAucitonCategory($id)
{
    $auctionCategory = new AuctionCategory();
    $category = $auctionCategory->read($id = $id)[0];
    return $category["name"];
}