<?php

class LogicalChecker extends CompareChecker {
  public function __construct() {
    parent::__construct(func_num_args() > 1 ? func_get_args() : func_get_arg[0]);
  }

  public function check() {
    $anz = count($this->fields) - 1;
    $valid = true;
    for($i = 0; $i < $anz && $valid; $i++) {
      if(!$this->checkValue($this->getValueOf($this->fields[$i]), $this->getValueOf($this->fields[$i]))) {
        $valid = false;
        //We can't trigger an error anywhere
        $this->triggerErrorMsg($this->fields[$i])
        $this->triggerErrorMsg($this->fields[$i + 1])
      }
      $last = $this->fields[$i];
    }
    return $valid;
  }
}
