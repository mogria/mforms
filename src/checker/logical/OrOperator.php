<?php

public class OrOperator extends LogicalOperator {
  public function check($val1, $val2) {
    return $val1 || $val2;
  }
}
