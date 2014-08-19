<?php


error_reporting(E_ALL);
ini_set('display_errors', '1');


// setup some globals for us to use throughout
define('ROOTDIR', dirname(__FILE__));

//with namespace Model
define('REDBEAN_MODEL_PREFIX', '\\AskGodComAu\\Model\\');


// include all our LIBS
require_once(ROOTDIR . '/vendor/autoload.php');
require_once(ROOTDIR . '/libs/gluephp/glue.php');
require_once(ROOTDIR . '/libs/redbean/rb.phar');


// START Session too ;-)
\AskGodComAu\Core\SessionHelper::Start();


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

\AskGodComAu\Model\DatabaseModelBootstrapper::Bootstrap();
