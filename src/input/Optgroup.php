<?php


class Optgroup extends InputfieldGroup implements InputfieldGroupMember {
  public function getType() {
    return "optgroup";
  }

  public function getSelected() {
    return false;
  }

  public function setSelected($value) {
    return false;
  }

  public function display() {
    $output = "<optgroup>";
    foreach($inputs as $i) {
      $output .= $i->display();
    }
    $output = "</optgroup>";
    return $output;
  }
}
