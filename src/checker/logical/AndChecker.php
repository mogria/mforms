<?php

class AndChecker implements Checker {
  protected $checkers = Array();

  public function __construct() {
    $checker = func_get_args();
    if(!is_array($checker[0])) {
      foreach($checker instanceof Checker) {
        $this->checkers[] = $checker;
      }
    } else {
      $this->checkers = $checker[0];
    }
  }

  public function check(Form $form) {
    $valid = true;
    foreach($this->checkers as $checker) {
      if(!$checker->check($form)) {
        $valid = false;
      }
    }
    return $valid;
  }
}
