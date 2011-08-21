<?php

class NorChecker extends LogialChecker{
  public function checkValue($checker1, $checker2) {
    return !($checker1->check($this->getForm()) || $checker2->check($this->getForm());
  }
}
