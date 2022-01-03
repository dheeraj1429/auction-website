<?php
require "./model/general.php";

function getGeneral()
{
    $general = new General();
    return $general;
}

function getValuesByName($name)
{
    $general = getGeneral();
    $data = $general->getDataByName($name)[0];
    return $data["key_value"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Smart Auction</title>
</head>

<body>
    <h1>Home Page</h1>
</body>

</html>