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

  public function validate() {
    if(!$this->check() && ($msg = $this->getErrmsg()) !== null) {
      foreach($this->fields as $field) {
        $field->addErrormsg($msg);
      }
    }
  }

  abstract public function check(Form $obj);

  public function __construct(Array $fields) {
    foreach($fields as $field) {
      if($field instanceof Inputfield) {
        $this->fields = $fields;
      }
    }
  }

}
