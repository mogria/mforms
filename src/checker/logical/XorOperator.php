<?php

public class XorOperator extends LogicalOperator {
  public function check($val1, $val2) {
    return ($val1 || $val2) && !($val1 && $val2);
  }
}
