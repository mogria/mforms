<?php

class NotInListChecker extends InListChecker{
  public function checkValue($value) {
    return !parent::checkValue($value);
  }
}
