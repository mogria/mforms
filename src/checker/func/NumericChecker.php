<?php

class NumericChecker extends FunctionChecker {
  public function __construct(Array $fields) {
    parent::__construct($field, 'is_numeric');
  }
}
