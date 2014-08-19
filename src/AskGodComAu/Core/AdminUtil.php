<?php namespace AskGodComAu\Core;

use R;

class AdminUtil
{

    public static function GetAdmin($username, $password) {
        $admin  = \R::findOne('admin', 'username = :username AND hash = :hash ', [ ':username' => $username, ':hash' => AdminUtil::Hash($password) ]);
        return $admin;
    }

    public static function Login($username, $password) {
        $admin = AdminUtil::GetAdmin($username, $password);
        if ($admin != null) {
            SessionHelper::set('admin', $admin);
        }
        return $admin;
    }

    public static function Logout() {
        SessionHelper::remove('admin');
    }

    public static function LoggedAdmin() {
        return SessionHelper::get('admin');
    }

    public static function Hash($input) {
        return hash('sha512', 'askgodcomau_' . $input, false);
    }


    public static function SetupAdmin($username, $password, $expertise, $superuser) {

        $admin = AdminUtil::GetAdmin($username, $password);

        if ($admin == null) {
            $admin = R::dispense('admin');
            $admin->username = $username;
            $admin->hash = AdminUtil::Hash($password);
            $admin->superuser = $superuser;
            $admin->expertise = $expertise;
            $adminID = R::store($admin);
            return $adminID;
        } else {
            return $admin->id;
        }

    }



}