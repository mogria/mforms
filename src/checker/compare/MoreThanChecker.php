<?php

class MoreThanChecker extends CompareChecker {
  public function checkValue($field1, $field2) {
    return (int)$field1 > (int)$field2;
  }
}
