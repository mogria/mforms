<?php

abstract class Checker {

  protected $errmsg = null;
  protected $fields = Array();

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

  protected functino getInput( $form, $field) {
    return $this->getForm()->getInputfieldByName($file);
  }

  protected function getValueOf(Form $form, $field) {
    return $this->getInput($form, $field)->getValue();
  }

  public function check(Form $form) {
    //go through each
    foreach($this->fields as $field) {
      //If it is an Inputfield, get the value of it
      if($field instanceof Inputfield) {
        $value = $this->getValueOf($this->getForm Form);
      } else {
        $value = $field;
      }
      //check the value
      if(($ret = $this->checkValue($value))) {
        //Set Errmsg on failure
        $this->triggerErrorMsg($this->getInput($field));
      }
    }
    return $ret;
  }

  public function triggerErrorMsg(Inputfield $input) {
    if(($msg = $this->getErrmsg()) != null) {
      $input->addErrmsg($msg);
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
