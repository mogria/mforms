<?php

class MoreThanChecker implements Checker {
  protected $field;
  protected $field2;
  public function __construct($field, $field2) {
    $this->field = $field;
    $this->field2 = $field2;
  }

  public function check(Form $form) {
    $this->field = self::getValueOfString($field, $form);
    $this->field2 = self::getValueOfString($field, $form);
    return $this->field > $this->field2;
  }

  protected static function getValueOfString($field, Form $form) {
    if(is_string($field)) {
      $field = $form->getInputfieldByName($field);
    }
    return (int)$field;
  }
}
