<?php

class AndOperator extends LogicalOperator {
  public function check($val1, $val2) {
    return $val1 && $val2;
  }
}
