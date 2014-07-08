<?php

class AskGodConfig
{
    public $db_server = 'localhost';
    public $db_dbname = 'askgodcomau_v1';
    public $db_username = 'root';
    public $db_password = 'password';
}

$config = new AskGodConfig();


// include redbean
require_once(dirname(__FILE__) . '/redbean/rb.phar');

R::setup('mysql:host=' . $config->db_server .';dbname=' . $config->db_dbname,
    $config->db_username, $config->db_password);


