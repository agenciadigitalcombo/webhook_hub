<?php

class Events
{

    private $id;
    private $data;
    private $channel;
    private $body;

    private $con;

    function __construct()
    {
        $this->con = new Banco();
        $this->con->table('events');
    }
}