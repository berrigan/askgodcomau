<?php namespace AskGodComAu\Model;


abstract class POSTModel {

    abstract public function getFields();
    abstract public function getValidations();
    abstract public function getFilters();

    private $is_valid = true;
    private $gump;

    function __construct() {
        $this->gump = new \GUMP();
        $this->gump->validation_rules($this->getValidations());
        $this->gump->filter_rules($this->getFilters());
    }

    private function consumeData($data) {
        $fields = $this->getFields();
        foreach ($fields as $field) {
            if (isset($data[$field])) {
                $this->$field = $data[$field];
            }
        }
    }

    public function consumePOST() {

        $data = $this->validate();

        if ($data === false) {
            $this->is_valid = false;
            $this->consumeData($this->filter());
        } else {
            $this->consumeData($data);
        }

        return $this->is_valid;
    }

    public function IsValid() {
        return $this->$is_valid;
    }


    private function validate() {
        $_POST = $this->gump->sanitize($_POST);
        return $this->gump->run($_POST);
    }

    private function filter() {
        $_POST = $this->gump->sanitize($_POST);
        return $this->gump->filter($_POST, $this->getFilters());
    }


} 