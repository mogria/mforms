<?php

abstract class InputfieldOption extends Inputfield {

  protected $selected;

  public function getSelected() {
    return $this->selected;
  }

  public function setSelected($value) {
    $this->selected = $value;
  }

  protected function addAttributes() {
    parent::addAttributes();
    $this->attributes[] = 'selected';
  }
}
