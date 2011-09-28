<?php

class NumericChecker extends FunctionChecker {

  /** Constructor
   * 
   * @param (Array) $field : Inputfields
   * @param (string) $search : String the Inputfield should contain
   */
  public function __construct(Array $fields) {
    parent::__construct($field, 'is_numeric');
  }
}
