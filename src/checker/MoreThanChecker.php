<?php

class MoreThanChecker extends CompareChecker {
  public function compare($field1, $field2) {
    return (int)$field1 > (int)$field2;
  }
}
