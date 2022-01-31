<?php
require_once "model/participant.php";
require_once "model/auction.php";
require_once "model/cronJobs.php";
require_once "refreshCron.php";
require_once "sendEmail.php";

function pospondAuction($auctionData, $posponedTime = 14)
{
    $cronJobs = new CronJobs();
    $auctionModel = new Auction();
    $updatedDate = date('Y-m-d', strtotime("+$posponedTime day", strtotime($auctionData["date"])));
    $auctionTime = $auctionData["time"];
    $isAuctionOnTime = $auctionModel->getAuctionByDateAndTime($updatedDate, $auctionTime);
    if ($isAuctionOnTime) {
        return pospondAuction($auctionData, $posponedTime = $posponedTime + 1);
    } else {
        $cronData = array("date" => $updatedDate, "time" => $auctionData["time"], "token" => $auctionData["token"]);
        $cronJobs->create($cronData);
        $auctionModel->update(array("date" => $updatedDate), $auctionData["id"]);
        $cronData = $cronJobs->read();
        $text = "";
        foreach ($cronData as $d) {
            $dateData = explode("-", $d['date']);
            $timeData = explode(":", $d['time']);
            $token = $d['token'];

            $day = $dateData[2];
            $month = $dateData[1];
            $hour = $timeData[0];
            $minute = $timeData[1];

            $cronText = "$minute $hour $day $month * wget -O /dev/null 'http://localhost/auction/auctionJob.php?token=$token'\n";
            $text .= $cronText;
        }
        $file = fopen("cronFile.txt", "w");
        fwrite($file, $text);
        shell_exec("php /opt/lampp/htdocs/auction/addCron.php");
        fclose($file);
        return array("date" => $updatedDate, "time" => $auctionData["time"]);
    }
}

function auctionFunction($token)
{
    $auctionModel = new Auction();
    $cronJobs = new CronJobs();
    $cronJobs->delete($token);
    $participant = new Participant();
    $auctionData = $auctionModel->getAuctionByToken($token);
    $participantData = $participant->read($auctionData["id"]);

    if (count($participantData) != $auctionData["capacity"]) {
        $pospondData = pospondAuction($auctionData);
        $date = $pospondData["date"];
        $time = $pospondData["time"];
        foreach ($participantData as $p) {
            sendEmail($p["email"], "We are posponding auction till $date, $time");
        }
    } else {
        foreach ($participantData as $p) {
            sendEmail($p["email"], "We are starting the auction you can participate at -> http://localhost/auction/bets.php?token=$token");
        }
    }
    refreshCron();
}

if (isset($_GET["token"])) {
    auctionFunction($_GET["token"]);
}