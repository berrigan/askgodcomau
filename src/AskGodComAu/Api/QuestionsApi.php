<?php namespace AskGodComAu\Api;


use AskGodComAu\Core\AdminUtil;
use AskGodComAu\Model\Admin;
use AskGodComAu\Model\IndexModel;
use AskGodComAu\Model\Question;
use R;

class QuestionsApi extends BaseApi {


    function GET()
    {
        if (parent::authenticate())
        {
            $data = R::exportAll(Question::GetAllBaseQuestions(), true);
            parent::echoJSON($data);
        }
    }


    function POST($matches) {

        if (parent::authenticate())
        {
            if (isset($matches['action'])) {
                switch ($matches['action']) {
                    case 'delete':
                        $id = $matches['id'];
                        self::handleDELETE($id);
                        break;
                }
            }
            else
            {
                self::handlePOST();
            }
        }

    }


    function handleDELETE($id) {

        $dbQ = Question::GetById($id);

        if ($dbQ == null)
        {
            echo '{ "success": true }';
        }
        else
        {
            Question::TraverseDelete($dbQ);
            echo '{ "success": true }';
        }
    }


    function handlePOST()
    {
        $model = parent::getModelFromJsonPOST();
        $beans = array();

        foreach ($model as $q) {
            Question::AddQuestion($q);
        }

        // then return same as GET ...
        $data = R::exportAll(Question::GetAllBaseQuestions(), true);
        parent::echoJSON($data);
    }




} 