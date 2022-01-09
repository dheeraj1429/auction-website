<?php
require_once "./sendEmail.php";
$command = "crontab /opt/lampp/htdocs/auction/cronFile.txt";
shell_exec($command);
sendEmail("udaylal014@gmail.com", "working");