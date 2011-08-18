<?php

class InListChecker implements Checker {

  protected $list;
  protected $field;

  public function __construct($field, Array $list) {
    $this->field = $field;
    $this->list = $list;
  }

  public function check(Form $form) {
    return in_array($form->getInputfieldByName($this->field)->getValue(), $this->list);
  }
}
