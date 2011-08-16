<?php

abstract class AbstractRegularExpressionChecker implements Checker {
  protected $field;
  protected $regular_expression = '/^[1-9][0-9]*[\.]{0,1}[0-9]$/i';

  public function __construct($field) {
    $this->field = $field;
  }

  public function check(Form $form) {
    $this->field = getInputfieldByName($form);
    return (bool)preg_match($this->regular_expression, $this->field->getValue())
  }
}
