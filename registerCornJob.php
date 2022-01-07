<?php
date_default_timezone_set('Asia/Kolkata');

class RegisterCornJob
{
    public function __construct($setAuctionJob = false, $setDBJob = false)
    {
        $this->setAuctionJob = $setAuctionJob;
        $this->setDBJob = $setDBJob;
        $this->fromScrach = false;
    }

    public function registerJob($auctionTime)
    {
        $auctionTask = $this->auctionJob($auctionTime);
        $dbTask = $this->databaseJob();
        $task = $dbTask . $auctionTask;
        file_put_contents("cronFile.txt", $task);
        shell_exec("crontab " . "cronFile.txt");
    }

    private function auctionJob($time)
    {
        $restTime = $this->calculateTime($time);
        $task = "{$restTime} * * * * php /opt/lampp/htdocs/auction/cronJobs/aucitonJob.php \n";
        return $task;
    }

    private function calculateTime($time)
    {
        $from_time = strtotime(date("H:i:s"));
        $to_time = strtotime($time);
        $restTime = round(abs($to_time - $from_time) / 60, 2);
        return $restTime;
    }

    public function registerDatabaseJob()
    {
        $dbJob = $this->databaseJob();
        $myfile = fopen("cronFile.txt", "r");
        $fileData = fread($myfile, filesize("cronFile.txt"));
        fclose($myfile);
        $data = explode("\n", $fileData);
        $data[0] = $dbJob;
        $cronFileData = $data[0] . $data[1];
        file_put_contents("cronFile.txt", $cronFileData);
    }

    private function databaseJob()
    {
        $restTime = $this->calculateTime("24:00:00");
        $task = "{$restTime} * * * * php /opt/lampp/htdocs/auction/cronJobs/dbJob.php \n";
        return $task;
    }
}