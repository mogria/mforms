<?php

class Radiogroup extends InputfieldGroup {

  public function display() {
    foreach($this->inputs as $i) {
      $i->display();
      echo "\n";
    }
  }

  public function getType() {
    return "radiogroup";
  }
}

