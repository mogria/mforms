<?php

class MoreEqualThanChecker extends LessThanChecker {
  public function checkValue($field1, $field2) {
    return parent::checkValue($field2, $field1);
  }
}
