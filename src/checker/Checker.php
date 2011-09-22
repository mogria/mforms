<?php

abstract class Checker {

  protected $errmsg = null;
  protected $fields = Array();

  protected $autotrigger = true;

  public function getAutotrigger() {
    return $this->autotrigger;
  }

  public function setAutotrigger($value) {
    $this->autotrigger = $value;
  }

  protected $form;

  public function getForm() {
    return $this->form;
  }

  public function setForm($form) {
    $this->form = $form;
  }

  public function getErrmsg() {
    return $this->errmsg;
  }

  public function setErrmsg($value) {
    $this->errmsg = $value;
  }

  public function check() {
    //go through each
    foreach($this->fields as $field) {
      //check the value

      $value = ($f = $field instanceof Inputfield) ?
      $field->getValue() : 
      $field;
      if (($ret = $this->checkValue($value)) && $f) {
        //Set Errmsg on failure and autotrigger is turned on
        $this->getAutotrigger() && $this->triggerErrorMsg($field);
      }
    }
    return $ret;
  }

  public function triggerErrorMsg(Inputfield &$input) {
    if(($msg = $this->getErrmsg()) != null) {
      $input = new ErrorMessage($input, $msg);
    }
  }

  abstract public function checkValue($value);

  public function __construct($fields) {
    //make $fields to an array and save it in the property $fields
    if(is_array($fields)) {
      $this->fields = $fields;
    } else {
      $this->fields = array($fields);
    }
  }
}
