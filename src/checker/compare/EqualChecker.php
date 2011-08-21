<?php

class EqualChecker extends CompareChecker{
  public function checkValue($field1, $field2) {
    return $field1 === $field2;
  }
}
