<?php namespace AskGodComAu\Core;


class HttpUtility {

    public static function Redirect($url, $statusCode = 303) {
        header('Location: ' . $url, true, $statusCode);
        die();
    }

} 