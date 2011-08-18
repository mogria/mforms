<?php

class NotInListChecker extends InListChecker{
  public function check(Form $form) {
    return !parent::check($form);
  }
}
