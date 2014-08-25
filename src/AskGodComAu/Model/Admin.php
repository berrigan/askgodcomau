<?php namespace AskGodComAu\Model;


/**
 * Class Admin
 * @package AskGodComAu\Model
 * @property string username
 * @property string hash
 * @property Question[] sharedQuestionList
 * @property bool superuser
 */
class Admin extends \RedBeanPHP\SimpleModel {


    /**
     * @return Admin
     */
    public static function DispenseModel()
    {
        /* @var $new Admin */
        $new = \R::dispense('admin');

        $new->username = '';
        $new->hash = '';

        $new->sharedQuestionList = [];
        $new->superuser = false;

        return $new;
    }



    public function update() {

    }

    public static function init() {

    }
}