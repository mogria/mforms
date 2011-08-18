<?php

class NandChecker implements Checker{
  protected $checker;
  public function __construct() {
    $this->checker = new NotChecker(new AndChecker(is_array(func_get_arg(0)) ? func_get_args(0) : func_get_args()));
  }

  public function check(Form $form) {
    $this->checker->check();
  }
}
