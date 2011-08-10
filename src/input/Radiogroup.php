<?php

class Radiogroup extends InputfieldGroup {

  public function display() {
    $append = "";
    foreach($this->inputs as $i) {
      $append .= $i->display();
      $append .= "\n";
    }
    return $append;
  }

  public function getType() {
    return "radiogroup";
  }
}

