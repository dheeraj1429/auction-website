<?php
require_once "vendor/autoload.php";


class RedisConnection
{
    public function __construct()
    {
        $this->redis = new Predis\Client();
    }

    public function getValueByKey($key)
    {
        return $this->redis->get($key);
    }

    public function setValue($key, $value)
    {
        $this->redis->set($key, $value);
    }

    public function setAuction($auctions)
    {
        foreach ($auctions as $auction) {
            $this->redis->lpush("auctions", $auction["id"]);
        }
    }

    public function getFirstAuction()
    {
        return $this->redis->lrange("auctions", 0, 0);
    }

    public function rmFisrstValue($value)
    {
        $this->redis->lrem("auctions", 0, $value);
    }
}