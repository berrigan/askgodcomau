<?php namespace AskGodComAu\Controllers;

use AskGodComAu\Model\AdminLoginModel;
use AskGodComAu\Core\AdminUtil;
use AskGodComAu\Core\HttpUtility;

class AdminLogin {

    private $twig;
    private $view;

    public function __construct()
    {
        $this->twig = \AskGodComAu\Core\TwigFactory::getTwig();
        $this->view = $this->twig->loadTemplate('admin.login.html');
    }

    function GET() {

        $form = new AdminLoginModel();

        $model = array(
            'title' => 'AskGod.com.au!',
            'nav' => 'admin.login',
            'form' => $form
        );

        echo $this->view->render($model);
    }

    function POST() {

        $error = '';

        $form = new AdminLoginModel();
        $is_valid = $form->consumePOST();

        if ($is_valid) {
            $admin = AdminUtil::Login($form->username, $form->password);
            if ($admin != null) {
                HttpUtility::Redirect('/admin/default');
            } else {
                $error = "Admin details not found.";
            }
        }

        $model = array(
            'title' => 'AskGod.com.au!',
            'nav' => 'AdminLogin',
            'form' => $form,
            'error' => $error
        );
        echo $this->view->render($model);
    }


} 