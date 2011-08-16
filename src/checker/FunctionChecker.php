<?php

class FunctionChecker implements Checker {
  protected $field;
  protected $callback;
  public function __construct($field, $callback) {
    $this->field = $field;
    $this->callback = $callback;
  }

  public function check(Form $form) {
    $value = $form->getInputfieldByName($this->field);
    if(is_callable($callback)) {
      return $callback($value);
    }
  }
}
