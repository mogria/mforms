<?php

class NotEqualChecker extends EqualChecker {
  public function compare($field1, $field2) {
    return !parent::compare($field1, $field2);
  }
}
