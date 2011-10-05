<?php

class EmptyChecker extends FunctionChecker {

  /** Constructor
   * 
   * @param (Array) $fields : Inputfields
   * @param (string) $search : String the Inputfield should contain
   */
  public function __construct(Array $fields) {
    parent::__construct($fields, 'empty');
  }
}
