<?php namespace AskGodComAu\Model;
use R;


/**
 * Model Question
 * @package AskGodComAu\Model
 * @property string title
 * @property string text
 * @property Question[] ownQuestionList Array of question which are 'owned' (/children) of this question
 */
class Question extends \RedBeanPHP\SimpleModel {


    /**
     * @return Question
     */
    public static function DispenseModel() {

        $new = \R::dispense('question');

        $new->title = '';
        $new->text = '';
        $new->ownQuestionList = [];

        return $new;
    }


    /**
     * @param $title
     * @param $text
     * @param $parent
     * @return Question
     */
    public static function MakeNewQuestion($title, $text, $parent) {

        $new = self::DispenseModel();
        $new->title = $title;
        $new->text = $text;

        $new->question = $parent;

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


} 