<?php

class LessThanChecker extends MoreThanChecker {
  public function __construct($field, $field2) {
    $this->field = $field2;
    $this->field2 = $field;
  }
}
