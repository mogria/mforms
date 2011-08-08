<?php

class InputfieldGroup extends Inputfield {
  protected $inputs;
  public function add(Inputfield $input) {

  }

  public function remove(Inputfield $input) {
    foreach($this->inputs as $key => $i) {
      if($i === $input) {
        unset($this->inputs[$key]);
      }
    }
  }

  public function setValue($value) {
    $set = false;
    foreach($this->inputs as $key => $i) {
      if((string)$i->getValue() === (string)$value) {
        $this->value = $value;
        $set = true;
        break;
      }
    }
    return $set;
  }
}
