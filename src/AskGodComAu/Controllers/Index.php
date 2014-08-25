<?php namespace AskGodComAu\Controllers;
use AskGodComAu\Core\MarkdownHelper;
use AskGodComAu\Core\RedbeanHelpers;
use AskGodComAu\Model\DatabaseModelBootstrapper;
use AskGodComAu\Model\IndexModel;
use AskGodComAu\Core\HttpUtility;
use AskGodComAu\Model\Userquestion;

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
            'blimp_markdown' => MarkdownHelper::GetMarkdownHtml('home_blimp.md'),
            'form' => $form

        );
        echo $this->view->render($model);
    }

    function POST() {

        // process $form ... if we can!

        $indexModel = new IndexModel();
        $is_valid = $indexModel->consumePOST();

        if ($is_valid) {

            $userquestion = Userquestion::ModelDispense();
            $userquestion->consumeIndexModel($indexModel);

            $model = array(
                'title' => 'AskGod.com.au!',
                'nav' => 'index',
                'blimp_markdown' => MarkdownHelper::GetMarkdownHtml('home_blimp.md'),
                'form' => $indexModel,
                'forceValidation' => true);

            try
            {
                $id = \R::store($userquestion);

//                $model = array(
//                    'title' => 'AskGod.com.au!',
//                    'nav' => 'index',
//                    'blimp_markdown' => MarkdownHelper::GetMarkdownHtml('home_blimp.md'),
//                    'form' => $indexModel
//                );

                // HttpUtility::Redirect("thanks/{$id}");
                HttpUtility::Redirect("thanks");
            }
            catch(\Exception $exSave) {
                $model = array('title' => 'AskGod.com.au!',
                    'nav' => 'index',
                    'blimp_markdown' => MarkdownHelper::GetMarkdownHtml('home_blimp.md'),
                    'form' => $indexModel,
                    'forceValidation' => true);
            }


        } else {

            $model = array('title' => 'AskGod.com.au!',
                'nav' => 'index',
                'blimp_markdown' => MarkdownHelper::GetMarkdownHtml('home_blimp.md'),
                'form' => $indexModel,
                'forceValidation' => true);
        }

        echo $this->view->render($model);
    }

} 