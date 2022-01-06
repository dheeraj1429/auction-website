<?php
require_once "model/general.php";

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