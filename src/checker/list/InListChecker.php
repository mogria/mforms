<?php

class InListChecker extends Checker {

  public function __construct($field, Array $list) {
    parent::__construct($field);
    $this->list = $list;
  }

  public function checkValue($value) {
    return in_array($field, $this->list);
  }
}
