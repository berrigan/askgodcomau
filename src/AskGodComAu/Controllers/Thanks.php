<?php namespace AskGodComAu\Controllers;

use AskGodComAu\Core\MarkdownHelper;

class Thanks {

    private $twig;
    private $view;

    public function __construct()
    {
        $this->twig = \AskGodComAu\Core\TwigFactory::getTwig();
        $this->view = $this->twig->loadTemplate('thanks.html');
    }

    function GET() {

        $model = array(
            'title' => 'AskGod.com.au!',
            'nav' => 'thanks',
            'markdown' => MarkdownHelper::GetMarkdownHtml('thanks.md')
        );

        echo $this->view->render($model);
    }

} 