<?php namespace AskGodComAu\Controllers;

use AskGodComAu\Core\HttpUtility;

class AdminRedirect {

    function GET() {
        HttpUtility::Redirect('/admin/default');
    }

} 