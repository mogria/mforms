<?php


class Select extends InputfieldGroup {
  public function getType() {
    return "select";
  }

  public function addAttributes() {
    $this->attributes[] = 'multiple';
  }

  public function display() {
    $output = "<select" . $this->getAttributeNodes($this->attributes) . ">";
    foreach($this->inputs as $i) {
      $output .= $i->display();
    }
    $output .= "</select>";
    return $i;
  }
}

