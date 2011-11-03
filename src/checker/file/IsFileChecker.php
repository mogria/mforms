<?php

class IsFileChecker extends Checker {
  public function checkValue($value) {
    return isset($value['tmp_name'], $value['name'], $value['size']) && is_file($value['tmp_name']);
  }
}
