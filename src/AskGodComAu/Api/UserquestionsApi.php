<?php namespace AskGodComAu\Api;


use AskGodComAu\Core\AdminUtil;
use AskGodComAu\Model\Admin;
use AskGodComAu\Model\IndexModel;
use AskGodComAu\Model\Question;
use AskGodComAu\Model\Userquestion;
use R;


class UserquestionsApi extends BaseApi {

    function GET()
    {
        if (parent::authenticate())
        {
            $data = R::exportAll(Userquestion::GetAllUserquestions(), true);
            parent::echoJSON($data);
        }
    }


    function POST()
    {
        if (parent::authenticate())
        {
            $model = parent::getModelFromJsonPOST();
            parent::echoJSON($model);
        }

    }

} 