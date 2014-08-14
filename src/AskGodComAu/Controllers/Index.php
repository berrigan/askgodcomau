<?php namespace AskGodComAu\Controllers;
use AskGodComAu\Core\RedbeanHelpers;
use AskGodComAu\Model\IndexModel;
use AskGodComAu\Core\HttpUtility;

class Index {

    private $twig;
    private $view;

    public function __construct()
    {
        $this->twig = \AskGodComAu\Core\TwigFactory::getTwig();
        $this->view = $this->twig->loadTemplate('index.html');
    }

    function GET() {

        $form = new IndexModel();

        $model = array(
            'title' => 'AskGod.com.au!',
            'nav' => 'index',
            'form' => $form
        );
        echo $this->view->render($model);
    }

    function POST() {

        // process $form ... if we can!

        $indexModel = new IndexModel();
        $is_valid = $indexModel->consumePOST();

        if ($is_valid) {

            $userquestion = \R::dispense('userquestion');
            $userquestion->consumeIndexModel($indexModel);

            try
            {
                $id = \R::store($userquestion);
                HttpUtility::Redirect("questions/{$id}");
            }
            catch(\Exception $exSave) {
                $model = array('title' => 'AskGod.com.au!',
                    'nav' => 'index',
                    'form' => $indexModel,
                    'forceValidation' => true);
            }


        } else {

            $model = array('title' => 'AskGod.com.au!',
                'nav' => 'index',
                'form' => $indexModel,
                'forceValidation' => true);
        }

        echo $this->view->render($model);
    }

} 