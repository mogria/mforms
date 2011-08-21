<?php

class OrChecker extends LogicalChecker {
  public function check() {
    $valid = false;
    foreach($this->checkers as $checker) {
      if($checker->check()) {
        $valid = true;
      }
    }
    return $valid;
  }
}
