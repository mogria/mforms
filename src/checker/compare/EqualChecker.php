<?php

class EqualChecker extends CompareChecker{

  /**
   * Compares to Values and checks if $field1 is equal to $field2
   *
   * @return (bool) : true on success, false on failure
   */
  public function checkValue($field1, $field2) {
    return $field1 === $field2;
  }
}
