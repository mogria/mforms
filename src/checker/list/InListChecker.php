<?php

class InListChecker implements Checker {

  public function __construct($field, Array $list) {
    partent::__construct($field);
    $this->list = $list;
  }

  public function check(Form $form) {
    return in_array($form->getInputfieldByName($this->field)->getValue(), $this->list);
  }
}
