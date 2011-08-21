<?php

class InListChecker extends Checker {

  protected $list;

  public function __construct($field, Array $list) {
    parent::__construct($field);
    $this->list = $list;
  }

  public function checkValue($value) {
    echo __METHOD__ . " : ";
    var_dump($value);
    //print_r(debug_backtrace());
    return in_array($value, $this->list);
  }
}
