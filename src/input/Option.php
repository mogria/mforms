<?php


class Option extends InputfieldOption {
  public function getType() {
    return "option";
  }

  public function display() {
    if($label = $this->getLabel()) {
      $value = $this->getAttributeNodes(Array('value'));
    } else {
      $label = $this->getValue();
    }
    return "<option" . $value . "" . $this->getAttributeNodes(Array('selected')) . ">" . htmlspecialchars($label) . "</option>";
  }
  
  public function displayLabel($inside) {
    return $inside;
  }
  
  public function getType() {
    return "option";
  }

}

