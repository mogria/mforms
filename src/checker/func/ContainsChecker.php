<?php

class ContainsChecker extends FunctionChecker {
  public function __construct(Array $fields, $search) {
    parent::__construct($fields, 'strpos', Array($search, null), 2);
  }
}
