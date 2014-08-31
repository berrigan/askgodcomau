<?php namespace AskGodComAu\Api;

use AskGodComAu\Core\AdminUtil;
use AskGodComAu\Model\Admin;
use R;

abstract class BaseApi {

    public function __construct()
    {
        header('Content-Type: application/json');
    }

    protected function authenticate() {

        $admin = AdminUtil::LoggedAdmin();

        if ($admin == null) {
            echo '{ "error" : "AdminSessionError" }';
            return false;
        }

        return true;
    }


    protected function echoJSON($responseData) {
        echo json_encode($responseData, JSON_PRETTY_PRINT);
    }



    function getModelFromJsonPOST()
    {
        return json_decode(file_get_contents('php://input'));
    }

} 