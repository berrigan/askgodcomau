<?php namespace AskGodComAu\Controllers;

use AskGodComAu\Core\MarkdownHelper;

class About {

    private $twig;
    private $view;

    public function __construct()
    {
        $this->twig = \AskGodComAu\Core\TwigFactory::getTwig();
        $this->view = $this->twig->loadTemplate('about.html');
    }

    function GET() {

        $markdownHtml = MarkdownHelper::GetMarkdownHtml('about_page.md');

        $model = array(
            'title' => 'AskGod.com.au!',
            'nav' => 'about',
            'markdown' => $markdownHtml
        );
        echo $this->view->render($model);
    }
}

