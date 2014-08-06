<?php namespace AskGodComAu\Controllers;

class IndexModel {

    public $name = '';
    public $email = '';
    public $question = '';

    private function consumePOST_single($postName) {
        if ($_POST[$postName]) {
            $this->$postName = $_POST[$postName];
        }
    }

    public function consumePOST() {
        $this->consumePOST_single('name');
        $this->consumePOST_single('email');
        $this->consumePOST_single('question');
    }
}


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
        $form->name = 'Owen Berry';
        $form->email = 'email@email.com';

        $model = array(
            'title' => 'AskGod.com.au!',
            'form' => $form
        );
        echo $this->view->render($model);
    }

    function POST() {

        $form = new IndexModel();
        $form->consumePOST();

        $form->email = 'not an email';

        // process $form ... if we can!


        // or return it, and see ...

        $model = array('title' => 'AskGod.com.au!',
                        'form' => $form,
                        'forceValidation' => true);

        echo $this->view->render($model);
    }

} 