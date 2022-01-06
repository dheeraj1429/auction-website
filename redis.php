<?php
require_once "vendor/autoload.php";


PredisAutoloader::register();
$redis = new PredisClient();