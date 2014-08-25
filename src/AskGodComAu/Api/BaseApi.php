<?php namespace AskGodComAu\Api;


abstract class BaseApi {

    function getModelFromJsonPOST()
    {
        return json_decode(file_get_contents('php://input'));
    }

} 