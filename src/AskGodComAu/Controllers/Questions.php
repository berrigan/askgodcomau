<?php namespace AskGodComAu\Controllers;

class Questions {

    private $twig;
    private $view;

    public function __construct()
    {
        $this->twig = \AskGodComAu\Core\TwigFactory::getTwig();
        $this->view = $this->twig->loadTemplate('questions.html');
    }

    function GET($matches) {

        $model = array(
            'title' => 'AskGod.com.au!',
            'nav' => 'questions'
        );

        if (sizeof($matches) === 2) {
            $userquestion = \R::findOne('userquestion', 'id = :id', [':id' => $matches[1] ]);
            if ($userquestion != null) {
                $model['userquestion'] = $userquestion;
            }
        }

        echo $this->view->render($model);
    }

} 