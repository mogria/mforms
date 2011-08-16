<?php

class RegularExpressionChecker extends AbstractRegularExpressionChecker {
  public function __construct($field, $regular_expression) {
    parent::__construct($field);
    $this->regular_expression = $regular_expression;
  }
}
