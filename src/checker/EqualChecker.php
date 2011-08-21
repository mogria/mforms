<?php

class EqualChecker implements CompareChecker{
  
  public function checkValue($val1, $val2) {
    return $val1 == $val2;
  }
}
