<?php

class LessEqualThanChecker extends MoreThanChecker {
  public function checkValue($field1, $field2) {
    return parent::checkValue($field2, $field1);
  }
}
