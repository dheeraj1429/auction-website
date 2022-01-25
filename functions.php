<?php
require_once "./model/participant.php";
require_once "./model/auctionCategory.php";
require_once "./model/bids.php";

date_default_timezone_set("Asia/Kolkata");

function isParticepeted($email, $auctionId)
{
    $participant = new Participant();
    $participants = $participant->getParticipant($email, $auctionId);
    if (empty($participants)) {
        return false;
    }
    return true;
}

function getAucitonCategory($id)
{
    $auctionCategory = new AuctionCategory();
    $category = $auctionCategory->read($id = $id)[0];
    return $category["name"];
}

function isAuctionStarted($date, $time, $endTime)
{
    $currentDate = date("Y-m-d");
    $currentTime = strtotime(date('H:i:s'));
    if ($currentDate == $date && $currentTime >= strtotime($time) && $currentTime <= strtotime($endTime)) {
        return true;
    }
    return false;
}

function getAuctionWinner($auctionId)
{
    $bids = new Bids();
    $result = $bids->getWinnerBid($auctionId);
    return $result[0];
}

function pagination($data, $page, $total)
{
    if ($data) {
        $dataLen = count($data);
        $previousPage = $page - 1 !== 0 ? $page - 1 : null;
        if ($dataLen <= $total) {
            $returnData = array(
                "paginationLen" => 0,
                "data" => $data,
                "currentPage" => $page,
                "previousPage" => $previousPage,
                "nextPage" => null,
            );
            return $returnData;
        }
        $paginationLen = round($dataLen / $total);
        $paginationData = array_slice($data, $page - 1, $total);
        $nextPage = $page + 1 <= $paginationLen ? $page + 1 : null;
        $returnData = array(
            "paginationLen" => $paginationLen,
            "data" => $paginationData,
            "previousPage" => $previousPage,
            "currentPage" => $page,
            "nextPage" => $nextPage,
        );
        return $returnData;
    }
    $returnData = array(
        "paginationLen" => 0,
        "data" => array(),
        "currentPage" => $page,
        "previousPage" => null,
        "nextPage" => null,
    );
    return $returnData;
}