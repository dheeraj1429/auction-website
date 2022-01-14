<?php
require_once "vendor/autoload.php";


class RedisConnection
{
    public function __construct($token)
    {
        $this->redis = new Predis\Client();
        $this->token = $token;
    }

    public function getValueByKey($key)
    {
        return $this->redis->get($key);
    }

    public function setValue($key, $value)
    {
        $this->redis->set($key, $value);
    }

    public function setAuction($value)
    {
        $bidData = $this->getAuctions();
        if (!isset($bidData)) {
            $bidData = array();
        }
        array_push($bidData, $value);
        $this->redis->hset($this->token, "bids", json_encode($bidData));
    }

    public function getAuctions()
    {
        $data = json_decode($this->redis->hget($this->token, "bids"), true);
        return $data;
    }

    public function getUsers()
    {
        $data = $this->redis->hget($this->token, "users");
        return json_decode($data, true);
    }

    public function setUsers($id)
    {
        $data = $this->getUsers();
        if (isset($data)) {
            array_push($data, $id);
        } else {
            $data = array($id);
        }
        $this->redis->hset($this->token, "users", json_encode($data));
    }

    public function rmFisrstValue($value)
    {
        $this->redis->lrem("auctions", 0, $value);
    }
}
