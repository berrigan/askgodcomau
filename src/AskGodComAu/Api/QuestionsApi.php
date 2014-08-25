<?php namespace AskGodComAu\Api;


use AskGodComAu\Core\AdminUtil;
use AskGodComAu\Model\Admin;
use AskGodComAu\Model\IndexModel;
use AskGodComAu\Model\Question;
use R;

class QuestionsApi extends BaseApi {

    public function __construct()
    {
        header('Content-Type: application/json');
    }

    function GET()
    {

//        $admin = AdminUtil::LoggedAdmin();
//        if ($admin == null) {
//            echo '{ "error" : "AdminSessionError" }';
//            return;
//        }


        echo json_encode(R::exportAll(Question::GetAllBaseQuestions(), true));

        // echo json_encode(R::exportAll(Question::GetAllQuestions()));

//        $m = new IndexModel();
//        $m->email = 'email@email.com';
//        $m->name = 'name';
//        $m->question = 'this is a question';
//
//        echo json_encode($m);
    }

    function POST() {

        $model = parent::getModelFromJsonPOST();

        echo (json_encode($model));

    }

} 