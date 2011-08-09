<?php

abstract class InputfieldGroup extends Inputfield {
  protected $inputs;
  public function add(InputfieldOption $input) {
    $this->inputs[] = $input;
    $input->setName($this->getName());
  }

  public function remove(InputGroupMember $input) {
    foreach($this->inputs as $key => $i) {
      if($i === $input) {
        unset($this->inputs[$key]);
      }
    }
  }

  public function setValue($value) {
    $set = false;
    foreach($this->inputs as $key => $i) {
      $i->setSelected((string)$i->getValue() === (string)$value ? $set = true : $i->getSelected());
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
    return $val;
  }
}
