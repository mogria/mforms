<?php

class XnorChecker {
  public function __construct($checkers) {
    $this->checker = new NotChecker(XnorChecker(count(func_get_args()) > 1 ? func_get_args() : $checkers[0]));
  }

  public function check(Form $form) {
    $this->checker->check($form);
  }
}
