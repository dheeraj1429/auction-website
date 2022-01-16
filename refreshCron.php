<?php
require_once "model/cronJobs.php";

function refreshCron()
{
    $cronJobs = new CronJobs();
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
    $file = fopen("./admin/cronFile.txt", "w");
    fwrite($file, $text);
    shell_exec("php /opt/lampp/htdocs/auction/addCron.php");
    fclose($file);
}