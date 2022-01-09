<?php
require_once "sendEmail.php";
date_default_timezone_set('Asia/Kolkata');

class RegisterCornJob
{
    public function __construct($setAuctionJob = false)
    {
        $this->setAuctionJob = $setAuctionJob;
        $this->fromScrach = false;
    }

    public function registerJob($auctionTime)
    {
        $auctionTask = $this->auctionJob($auctionTime);
        $dbTask = $this->databaseJob();
        $task = $dbTask . $auctionTask;
        file_put_contents("cronFile.txt", $task);
        $this->writeCronTab();
    }

    private function writeCronTab()
    {
        $command = "php /opt/lampp/htdocs/auction/addCron.php";
        shell_exec($command);
    }

    private function auctionJob($time)
    {
        $restTime = explode(":", $time);
        $task = "{$restTime[1]} {$restTime[0]} * * * wget -O /dev/null 'http://localhost/auction/auctionJob.php'\n";
        return $task;
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
        $task = "0 0 * * *  wget -O /dev/null 'http://localhost/auction/dbJob.php'\n";
        return $task;
    }
}