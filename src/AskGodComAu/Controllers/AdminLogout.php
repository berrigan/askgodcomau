<?php namespace AskGodComAu\Controllers;

use AskGodComAu\Core\AdminUtil;
use AskGodComAu\Core\HttpUtility;

class AdminLogout {

    function GET() {
        AdminLogout::logout();
    }

    function POST() {
        AdminLogout::logout();
    }

    private static function logout() {
        AdminUtil::Logout();
        HttpUtility::Redirect('/admin/');
    }

} 