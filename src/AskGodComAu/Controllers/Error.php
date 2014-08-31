<?php namespace AskGodComAu\Controllers;

class Error {

    private $twig;
    private $view;

    public function __construct()
    {
        $this->twig = \AskGodComAu\Core\TwigFactory::getTwig();
        $this->view = $this->twig->loadTemplate('error.html');
    }

    function GET() {

        $model = array(
            'title' => 'AskGod.com.au!',
            'nav' => 'error'
        );

        echo $this->view->render($model);
    }


} 