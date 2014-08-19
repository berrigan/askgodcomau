<?php namespace AskGodComAu\Controllers;

use AskGodComAu\Core\AdminUtil;
use AskGodComAu\Core\HttpUtility;
use AskGodComAu\Core\SessionHelper;
use AskGodComAu\Model\Admin;

class AdminDefault {

    private $twig;
    private $view;

    public function __construct()
    {
        $this->twig = \AskGodComAu\Core\TwigFactory::getTwig();
        $this->view = $this->twig->loadTemplate('admin.default.html');
    }

    function GET() {

        // Check user logged in OK ...
        $admin = AdminUtil::LoggedAdmin();
        if ($admin == null) {
            HttpUtility::Redirect('/admin/login');
        }

        $model = array(
            'title' => 'AskGod.com.au!',
            'nav' => 'admin.default'
        );

        echo $this->view->render($model);
    }

} 