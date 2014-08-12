<?php namespace AskGodComAu\Model;

use AskGodComAu\Core\RedbeanHelpers;

class Userquestion extends \RedBeanPHP\SimpleModel {

    public function update() {

    }

    public static function init() {

    }

    public function consumeIndexModel($indexModel) {
        RedbeanHelpers::ConsumeData($this, $indexModel);
    }

}