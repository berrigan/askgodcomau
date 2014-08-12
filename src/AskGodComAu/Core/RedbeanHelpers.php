<?php namespace AskGodComAu\Core;


class RedbeanHelpers {

    public static function ConsumeData($bean, $model) {
        $fields = $model->getFields();
        foreach ($fields as $field) {
            $bean->$field = $model->$field;
        }
    }

} 