<?php

class LessEqualThanChecker extends MoreThanChecker {
  public function compare($field1, $field2) {
    return parent::compare($field2, $field1);
  }
}
