<?php

class XnorChecker extends LogicalChecker {
  public function __construct($checkers) {
    $this->checker = new NotChecker(XorChecker(func_get_args());
  }

  public function check() {
    $this->checker->setForm($this->getForm);
    $this->checker->check($form);
  }
}
