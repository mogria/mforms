<?php

abstract class InputfieldGroup extends Inputfield {
  protected $inputs;
  public function add(InputfieldOption $input) {
    $this->inputs[] = $input;
    $input->setName($this->getName());
  }

  public function remove(InputfieldOption $input) {
    foreach($this->inputs as $key => $i) {
      if($i === $input) {
        unset($this->inputs[$key]);
      }
    }
  }

  public function setValue($value) {
    $set = false;
    foreach($this->inputs as $key => $i) {
      $this->setSelected((string)$i->getValue() === (string)$value ? $set = true : false);
    }
    return $set;
  }

  public function getValue() {
    $val = false;
    foreach($this->inputs as $key => $i) {
      if($i->getSelected()) {
        $val = $i->getValue();
      }
    }
    return $value;
  }
}
