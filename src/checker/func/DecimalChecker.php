<?php

class NumericChecker extends FunctionChecker {
  /** Constructor
   * 
   * @param (Array) $field : Inputfields
   */
  public function __construct(Array $fields) {
    parent::__construct($field, 'ctype_digit');
  }
}
