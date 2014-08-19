<?php namespace AskGodComAu\Model;

use AskGodComAu\Core\AdminUtil;


class DatabaseModelBootstrapper {

    public static function Bootstrap() {


        DatabaseModelBootstrapper::Admins();
    }


    private static function Admins() {
        AdminUtil::SetupAdmin('owen', 'cHEAT5', 'everything', true);

        AdminUtil::SetupAdmin('malcolm', 'malcolm', 'everything', true);

        AdminUtil::SetupAdmin('simon', 'simon', 'everything', true);
        AdminUtil::SetupAdmin('charles', 'charles', 'everything', true);
    }

} 