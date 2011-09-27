<?php

class LessEqualThanChecker extends MoreThanChecker {
  /**
   * Compares to Values and checks if $field1 is less or equal than $field2
   *
   * @return (bool) : true on success, false on failure
   */
  public function checkValue($field1, $field2) {
    return parent::checkValue($field2, $field1);
  }
}
