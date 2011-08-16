<?php

class MoreEqualThanChecker extends LessThanChecker {
  public function check(Form $form) {
    return !parent::check($form);
  }
}
