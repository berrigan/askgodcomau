<?php namespace AskGodComAu\Model;

class IndexModel extends POSTModel {

    public function getFields() { return self::$fields; }
    public function getValidations() { return self::$validations; }
    public function getFilters() { return self::$filters; }

    private static $fields = array(
        'name', 'email', 'questiontext'
    );

    private static $validations = array(
        'name'      => 'required',
        'email'     => 'required|valid_email',
        'questiontext'  => 'required'
    );

    private static $filters = array(
        'name'      => 'trim|sanitize_string',
        'email'     => 'trim|sanitize_email',
        'questiontext'  => 'trim|sanitize_string'
    );

    public $name = '';
    public $email = '';
    public $questiontext = '';

}