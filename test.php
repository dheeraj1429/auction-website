<?php
require_once "./registerCornJob.php";


$registerCornJob = new RegisterCornJob();
$registerCornJob->registerJob("17:08:00");
echo "working";