<?php namespace AskGodComAu\Core;

class AdminUtil
{
    public static function Hash($input) {
        return hash('sha512', 'askgodcomau_' . $input, false);
    }


    public static function GetAdmin($username, $password) {
        $admin  = \R::find('admin', 'username = :username AND hash = :hash ', [ ':username' => $username, ':hash' => AdminUtil::Hash($password) ]);
        return $admin;
    }


}