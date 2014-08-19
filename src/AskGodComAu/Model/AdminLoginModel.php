<?php namespace AskGodComAu\Model;


class AdminLoginModel extends POSTModel {

    public function getFields() { return self::$fields; }
    public function getValidations() { return self::$validations; }
    public function getFilters() { return self::$filters; }

    private static $fields = array(
        'username', 'password'
    );

    private static $validations = array(
        'username'      => 'required',
        'password'     => 'required'
    );

    private static $filters = array(
        'username'      => 'trim|sanitize_string',
        'password'  => 'trim|sanitize_string'
    );

    public $username = '';
    public $password = '';
} 