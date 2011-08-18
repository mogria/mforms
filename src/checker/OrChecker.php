<?php

class OrChecker extends AndChecker {
  public function check(Form $form) {
    $valid = false;
    foreach($this->checkers as $checker) {
      if($checker->check()) {
        $valid = true;
      }
    }
    return $valid;
  }
}
