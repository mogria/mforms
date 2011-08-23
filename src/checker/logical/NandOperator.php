<?php

public class NandOperator extends AndOperator {
  public function check($val1, $val2) {
    return !parent::check($val1, $val2);
  }
}
