<?php

$out = shell_exec("crontab " . "cronJobs/cronFile.txt");
echo $out;
echo shell_exec("echo 'test'");