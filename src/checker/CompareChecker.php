<?php

abstract class CompareChecker implements Checker {
  protected $fields;

  public function __construct(Array $fields) {
    $this->fields = array_values($fields);
  }

  public function check(Form $form) {
    $anz = count($this->fields) - 1;
    $valid = true;
    for($i = 0; $i < $anz && $valid; $i++) {
      $val1 = self::getValueOfString($this->fields[$i], $form);
      $val2 = self::getValueOfString($this->fields[$i + 1], $form);
      if(!$this->compare($val1, $val2)) {
        $valid = false;
      }
    }
    return $valid;
  }

  protected static function getValueOfString($field, Form $form) {
    if(is_string($field)) {
      $field = $form->getInputfieldByName($field);
    }
    return $field;
  }

  abstract public function compare($field1, $field2);
}
