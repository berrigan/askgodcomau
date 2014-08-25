<?php namespace AskGodComAu\Controllers;


use AskGodComAu\Core\MarkdownHelper;

class Events {

    private $twig;
    private $view;

    public function __construct()
    {
        $this->twig = \AskGodComAu\Core\TwigFactory::getTwig();
        $this->view = $this->twig->loadTemplate('events.html');
    }

    function GET() {

        $model = array(
            'title' => 'AskGod.com.au!',
            'nav' => 'events',
            'markdown' => MarkdownHelper::GetMarkdownHtml('events.md'),
            'bodyclass' => 'events'
        );

        echo $this->view->render($model);
    }

} 