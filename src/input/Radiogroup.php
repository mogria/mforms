<?php

class Radiogroup extends InputfieldGroup {

  public function display() {
    foreach($this->inputs as $i) {
      echo $i->display();
      echo "\n";
    }
  }

  public function getType() {
    return "radiogroup";
  }

  public function displayLabel($inside) {
    return $inside;
  }
}

