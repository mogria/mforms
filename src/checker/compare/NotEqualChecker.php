<?php

class NotEqualChecker extends EqualChecker {

  /**
   * Compares to Values and checks if $field1 is not equal to $field2
   *
   * @return (bool) : true on success, false on failure
   */
  public function checkValue($field1, $field2) {
    return !parent::checkValue($field1, $field2);
  }
}
