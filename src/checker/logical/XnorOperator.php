<?php

public class XnorOperator extends XorOperator {
  public function check($val1, $val2) {
    return !parent::check($val1, $val2);
  }
}
