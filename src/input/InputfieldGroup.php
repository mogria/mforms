<?php

abstract class InputfieldGroup extends Inputfield implements Iterator {
  protected $inputs;

  protected $pos;

  public function next() {
    $this->pos++;
  }

  public function prev() {
    $this->pos--;
  }

  public function rewind() {
    $this->pos = 0;
  }

  public function valid() {
    return $this->pos < count($this->inputs);
  }

  public function current() {
    return $this->inputs[$this->pos];
  }

  public function key() {
    return $this->pos;
  }

  public function add(InputfieldGroupMember $input) {
    $this->inputs[] = $input;
    $input->setName($this->getName());
  }

  public function remove(InputfieldGroupMember $input) {
    foreach($this->inputs as $key => $i) {
      if($i === $input) {
        unset($this->inputs[$key]);
      }
    }
  }

  public function setValue($value) {
    $set = false;
    foreach($this->inputs as $key => $i) {
      if($i instanceof InputfieldGroup) {
        if($i->setValue($value)) {
          $set = true;
        }
      } else {
        $i->setSelected((string)$i->getValue() === (string)$value ? $set = true : $i->getSelected());
      }
    }
    return $set;
  }

  public function getValue() {
    $val = false;
    foreach($this->inputs as $key => $i) {
      if($i instanceof InputfieldGroup) {
        $nval = $i->getValue();
        if(!$nval) {
          $val = $nval;
        }
      } else if($i->getSelected()) {
        $val = $i->getValue();
      }
    }
    return $val;
  }
}
