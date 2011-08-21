<?php

class NotEqualChecker extends EqualChecker {
  public function checkValue($field1, $field2) {
    return !parent::checkValue($field1, $field2);
  }
}
