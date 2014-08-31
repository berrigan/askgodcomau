<?php namespace AskGodComAu\Model;
use R;


/**
 * Model Question
 * @package AskGodComAu\Model
 * @property string idtext
 * @property string title
 * @property string text
 * @property Question[] ownQuestionList Array of question which are 'owned' (/children) of this question
 */
class Question extends \RedBeanPHP\SimpleModel {

    private static $beanname = 'question';



    /**
     * @param $id
     * @return Question
     */
    public static function GetById($id) {
        return R::findOne('question', ' id = :id ', array(':id' => $id));
    }





    public static function AddQuestion($qModel) {

        $dbQ = null;

        if (isset($qModel->id)) {
            $dbQ = Question::GetById($qModel->id);
        }

        if ($dbQ == null) {
            $dbQ = Question::MakeNewQuestion($qModel->idtext, $qModel->title, $qModel->text);
        }

        if (isset($qModel->ownQuestion)) {
            foreach ($qModel->ownQuestion as $qModelChild) {
                $dbChild = self::AddQuestion($qModelChild);

                $dbQ->ownQuestionList[] = $dbChild;

//                if (!in_array($dbChild, $dbQ->ownQuestionList)) {
//                    $dbQ->ownQuestionList[] = $dbChild;
//                }

            }
        }

        R::store($dbQ);

        return $dbQ;
    }



    /**
     * @return Question
     */
    public static function DispenseModel() {

        $new = \R::dispense('question');

        $new->idtext = '';
        $new->title = '';
        $new->text = '';
        $new->ownQuestionList = [];

        return $new;
    }


    /**
     * @param $idtext
     * @param $title
     * @param $text
     * @return Question
     */
    public static function MakeNewQuestion($idtext, $title, $text) {

        $new = self::DispenseModel();
        $new->idtext = $idtext;
        $new->title = $title;
        $new->text = $text;

        // $new->question = $parent;

        $id = R::store($new);

        return $new;
    }


    /**
     *
     * @return Question[]
     */
    public static function GetAllBaseQuestions()
    {
        return R::find('question', ' question_id IS NULL ');
    }

    /**
     *
     * @return Question[]
     */
    public static function GetAllQuestions()
    {
        return R::findAll('question');
    }




    public static function TraverseDelete($q)
    {
        $q->traverse( 'ownQuestion', function($child) {
            self::TraverseDelete($child);
        });
        R::trash($q);
    }



} 