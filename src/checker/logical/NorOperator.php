<?php

public class NorOperator extends OrOperator{
  public function check($val1, $val2) {
    return !parent::check($val1, $val2);
  }
}
