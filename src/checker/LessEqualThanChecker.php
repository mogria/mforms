<?php

class LessEqualThanChecker extends MoreThanChecker {
  public function check(Form $form) {
    return !parent::check($form);
  }
}
