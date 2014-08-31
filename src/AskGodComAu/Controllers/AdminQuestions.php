<?php namespace AskGodComAu\Controllers;


use AskGodComAu\Core\AdminUtil;
use AskGodComAu\Core\HttpUtility;

class AdminQuestions {

    private $twig;
    private $view;

    public function __construct()
    {
        $this->twig = \AskGodComAu\Core\TwigFactory::getTwig();
        $this->view = $this->twig->loadTemplate('admin.questions.html');
    }

    function GET() {

        // Check user logged in OK ...
        $admin = AdminUtil::LoggedAdmin();

        if ($admin == null || $admin->superuser == false) {
            HttpUtility::Redirect('/admin/login');
        }

        $model = array(
            'title' => 'AskGod.com.au!',
            'nav' => 'admin.questions',
            'admin' => $admin
        );

        echo $this->view->render($model);
    }

} 