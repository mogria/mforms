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

  public function remove($c) {
    foreach($this->fields as $key => $member) {
      if($this->fields === $member) {
        unset($this->fields[$key]);
      }
    }
  }

  public function add($c) {
     if($c instanceof InputfieldInterface) {
      $this->fields[] = $c;
    }
  }

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

      $value = ($f = $field instanceof InputfieldInterface ) ?
        $field->getValue() :
        $field;
      if (($ret = $this->checkValue($value)) && $this->getAutotrigger()) {
        //Set Errmsg on failure and autotrigger is turned on
        $this->triggerErrorMsg($field);
      }
    }
    return $ret;
  }

  public function triggerErrorMsg(InputfieldInterface &$input) {
    if(($msg = $this->getErrmsg()) != null) {
      $input = new ErrorMessage($input, $msg);
    }
  }

  abstract public function checkValue($value);

  public function __construct($fields) {
    //make $fields to an array and save it in the property $fields
    if(is_array($fields)) {
      foreach($fields as $f) {
        $this->add($f); 
      }
    } else {
      $this->add($fields);
    }
  }
}
