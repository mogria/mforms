<?php

abstract class CompareChecker extends Checker {
  protected $fields;

  /**
   * Overrides the check()-Method of Checker
   * It now passes 2 Inputfields to checkValue()
   *
   * @return (bool) : true if comparison were successful, false if not
   */
  public function check() {
    $anz = count($this->fields) - 1;
    $valid = true;
    for($i = 0; $i < $anz && $valid; $i++) {
      $val1 = ($fields[$i] instanceof InputfieldInterface) ? $this->fields[$i]->getValue() : $fields[$i];
      $val2 = ($fields[$i + 1] instanceof InputfieldInterface) ? $this->fields[$i + 1]->getValue() : $fields[$i + 1];
      if(!$this->checkValue($val1, $val2)) {
        $valid = false;
        $this->triggerErrorMsg($this->fields[$i]);
        $this->triggerErrorMsg($this->fields[$i + 1]);
      }
    }
    return $valid;
  }
}
