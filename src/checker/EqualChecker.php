<?php

class EqualChecker implements Checker{
  
  protected $fields;
  public function __construct(Array $fields) {
    $this->fields = array_values($fields);
  }

  public function check(Form $form) {
    $anz = count($this->fields) - 1;
    $valid = true;
    for($i = 0; $i < $anz && $valid; $i++) {
      $val1 = $form->getInputfieldByName($this->fields[$i])->getValue();
      $val2 = $form->getInputfieldByName($this->fields[$i + 1])->getValue();
      echo "VERGLEICH:\n";
      echo "$val1 !== $val2 \n";
      if($val1 !== $val2 ) {
        $valid = false;
      }
    }
    echo "RETURNING: " . (($valid) ? "true" : "false") . "\n";
    return $valid;
  }
}
