<?php

class MoreThanChecker extends CompareChecker {

  /**
   * Compares to Values and checks if $field1 is more than $field2
   *
   * @return (bool) : true on success, false on failure
   */
  public function checkValue($field1, $field2) {
    return (int)$field1 > (int)$field2;
  }
}
