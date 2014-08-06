<?php

// setup some globals for us to use throughout
define('ROOTDIR', dirname(__FILE__));


// include all our LIBS
require_once(ROOTDIR . '/vendor/autoload.php');

require_once(ROOTDIR . '/libs/gluephp/glue.php');

//with namespace Model
define('REDBEAN_MODEL_PREFIX', '\\AskGodComAu\\Model\\');
require_once(ROOTDIR . '/libs/redbean/rb.phar');


// include our necessary CORE
// require_once(ROOTDIR . '/src/AskGodComAu/Core/TwigFactory.php');



class AskGodConfig
{
    public $db_server = 'localhost';
    public $db_dbname = 'askgodcomau_v1';
    public $db_username = 'root';
    public $db_password = 'password';
}

$config = new AskGodConfig();

R::setup('mysql:host=' . $config->db_server .';dbname=' . $config->db_dbname,
    $config->db_username, $config->db_password);



class AdminUtil
{
    public static function GetAdmin($username, $password) {
        $admin  = R::find('admin', 'username = :username AND hash = :hash ', [ ':username' => $username, ':hash' => AdminUtil::Hash($password) ]);
        return $admin;
    }

    public static function Hash($input) {
        return hash('sha512', 'askgodcomau_' . $input, false);
    }
}


require_once(ROOTDIR . '/modelsetup.php');

