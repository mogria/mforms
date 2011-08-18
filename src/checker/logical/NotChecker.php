<?php

class NotChecker implements Checker {
  protected $checker;
  public function __construct(Checker $checker) {
    $this->checker = $checker;
  }

  public function check(Form $form) {
    return !$checker->check($form);
  }
}
