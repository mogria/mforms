<?php

class EqualChecker implements CompareChecker{
  public function compare($field1, $field2) {
    return $field1 === $field2;
  }
}
