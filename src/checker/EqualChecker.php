<?php

class EqualChecker implements Checker{
  
  protected $fields;
  public function __construct(Array $fields) {
    $this->fields = array_values($fields);
  }

  public function check(Form $form) {
    $anz = count($fields) - 1;
    $valid = true;
    for($i = 0; $i < $anz && $valid; $i++) {
      if($form->getInputfieldByName($fields[$i])->getValue() !== $form->getInputfieldByName($fields[$i + 1])->getValue()) {
        $valid = false;
      }
    }
    return $valid;
  }
}
