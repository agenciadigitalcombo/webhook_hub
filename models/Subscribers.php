<?php

class Subscribers
{

    private $id;
    private $data;
    private $channel;
    private $url;
    
    private $con;

    function __construct()
    {
        $this->con = new Banco();
        $this->con->table('subscribers');
    }

    function list()
    {
        return $this->con->select();
    }    
    
    function list_by_channel(string $channel)
    {
        $this->con->where([ "channel" => $channel]);
        return $this->con->select();
    }
    
    function add(string $channel, string $url )
    {
        return $this->con->insert([
            "data" => date('Y-m-d'),
            "channel" => $channel,
            "url" => $url
        ]);
    }    
    
    function remove(string $channel, string $url )
    {
        $this->con->where([
            "channel" => $channel,
            "url" => $url
        ]);
        $this->con->delete();
        return true;
    }
}