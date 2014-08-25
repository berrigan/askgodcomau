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


    /**
     * @param $name
     * @return Userquestion
     */
    public static function GetUser($name)
    {
        return R::findOne(' name = :name ', [ ':name' => $name ]);
    }

    public static function NewUserquestion($name, $email, $questiontext) {

        $newUserquestion = self::ModelDispense();
        $newUserquestion->name = $name;
        $newUserquestion->email = $email;
        $newUserquestion->questiontext = $questiontext;
        R::store($newUserquestion);

        return $newUserquestion;
    }



    public function dispense() {

    }


    public function update() {

    }

    public static function init() {

    }

    public function consumeIndexModel($indexModel) {
        RedbeanHelpers::ConsumeData($this, $indexModel);
    }

}