<?php
// require_once "sendEmail.php";

// sendEmail("udaylal014@gmail.com", "running");
$command = "crontab /opt/lampp/htdocs/auction/admin/cronFile.txt";
shell_exec($command);