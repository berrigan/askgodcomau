<?php namespace AskGodComAu\Model;

use AskGodComAu\Core\RedbeanHelpers;
use R;


/**
 * Model Userquestion
 * @package AskGodComAu\Model
 * @property string $name
 * @property string $email
 * @property string $questiontext
 * @property Question[] sharedQuestionList array of questions this userquestion is linked to
 */
class Userquestion extends \RedBeanPHP\SimpleModel {


    private static $beanname = 'userquestion';


// * @property Array sharedQuestionList array of questions this userquestion is linked to

    /**
     * Dispense a Model Userquestion, with preset everything
     * @return \AskGodComAu\Model\Userquestion
     */
    public static function ModelDispense() {

        $new = \R::dispense('userquestion');
        $new->name = '';
        $new->email = '';
        $new->questiontext = '';
        $new->sharedQuestionList = [];

        return $new;
    }


    public function consumeIndexModel($indexModel) {
        RedbeanHelpers::ConsumeData($this, $indexModel);
    }


    /**
     * @param $name
     * @return Userquestion
     */
    public static function GetUser($name)
    {
        return R::findOne(self::$beanname, ' name = :name ', [ ':name' => $name ]);
    }

    public static function NewUserquestion($name, $email, $questiontext) {

        $newUserquestion = self::ModelDispense();
        $newUserquestion->name = $name;
        $newUserquestion->email = $email;
        $newUserquestion->questiontext = $questiontext;
        R::store($newUserquestion);

        return $newUserquestion;
    }


    /**
     * @return Userquestion[]
     */
    public static function GetAllUserquestions()
    {
        return R::findAll(self::$beanname);
    }



}