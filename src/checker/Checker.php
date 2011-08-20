<?php

abstract class Checker {

  protected $errmsg = null;
  protected $fields = Array();

  public function getErrmsg() {
    return $this->errmsg;
  }

  public function setErrmsg($value) {
    $this->errmsg = $value;
  }

  protected function getValueOf(Form $form, $field) {
    return $form->getInputfieldByName($file)->getValue();
  }

  public function check(Form $form) {
    //go through each
    foreach($this->fields as $field) {
      //If it is an Inputfield, get the value of it
      if($field instanceof Inputfield) {
        $value = $this->getValueOf($form Form);
      } else {
        $value = $field;
      }
      //check the value
      if(($ret = $this->checkValue($value))) {
        //Set Errmsg on failure
        if(($msg = $this->getErrmsg()) != null) {
          $this->addErrmsg($msg);
        }
      }
    }
    return $ret;
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
