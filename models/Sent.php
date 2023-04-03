<?php

class Sent
{

    private $id;
    private $data;
    private $channel;
    private $url;
    private $body;
    private $status_code;

    private $con;

    function __construct()
    {
        $this->con = new Banco();
        $this->con->table('sent');
    }
}