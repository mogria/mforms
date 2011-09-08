<?php


class Select extends InputfieldGroup {

  protected $multiple;

  public function getType() {
    return "select";
  }

  public function addAttributes() {
    $this->attributes[] = 'multiple';
  }

  /*public function display() {
    $output = "<select" . $this->getAttributeNodes($this->attributes) . ">\n";
    foreach($this->inputs as $i) {
      $output .= $i->display() . "\n";
    }
    $output .= "</select>\n";
    $output = $this->displayLabel($output);
    return $output;
  }*/

  public function setMultiple($multiple) {
    $this->multiple = $multiple;
  }

  public function getMultiple() {
    return $this->multiple;
  }
}

