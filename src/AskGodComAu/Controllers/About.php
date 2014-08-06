<?php namespace AskGodComAu\Controllers;

class About {

    private $twig;
    private $view;

    public function __construct()
    {
        $this->twig = \AskGodComAu\Core\TwigFactory::getTwig();
        $this->view = $this->twig->loadTemplate('about.html');
    }

    function GET() {

        $model = array('title' => 'AskGod.com.au!');
        echo $this->view->render($model);
    }
}

