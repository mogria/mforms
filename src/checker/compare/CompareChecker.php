<?php

abstract class CompareChecker extends Checker {
  protected $fields;

  public function check() {
    $anz = count($this->fields) - 1;
    $valid = true;
    for($i = 0; $i < $anz && $valid; $i++) {
      $val1 = $this->getValueOf($form, $this->fields[$i]);
      $val2 = $this->getValueOf($form, $this->fields[$i] );
      if(!$this->checkValue($val1, $val2)) {
        $valid = false;
        $this->triggerErrorMsg($this->fields[$i])
        $this->triggerErrorMsg($this->fields[$i + 1])
      }
    }
    return $valid;
  }

  abstract public function checkValue($val1, $val2);
}
