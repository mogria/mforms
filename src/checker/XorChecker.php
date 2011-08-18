<?php

class XorChecker extends AndChecker {

  public function check(Form $form) {
    $valid = false;
    foreach($this->checkers  as $checker) {
      $valid = $this->checker->check() != $valid;
    }
    return $valid;
  }
}
