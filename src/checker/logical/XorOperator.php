<?php

class XorOperator implements LogicalOperator {
  public function check($val1, $val2) {
    return ($val1 || $val2) && !($val1 && $val2);
  }
}
