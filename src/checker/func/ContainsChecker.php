<?php

class ContainsChecker extends FunctionChecker {
  
  /** Constructor
   * 
   * @param (Array) $field : Inputfields
   * @param (string) $search : String the Inputfield should contain
   */
  public function __construct(Array $fields, $search) {
    parent::__construct($fields, 'strpos', Array($search, null), 2);
  }
}
