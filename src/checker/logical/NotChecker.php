<?php

class NotChecker extends Checker {
  public function checkValue() {
    return !$checker->check($this->getForm());
  }
}
