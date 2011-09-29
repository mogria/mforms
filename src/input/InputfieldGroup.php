<?php

abstract class InputfieldGroup extends Inputfield implements Iterator {
  protected $inputs;

  protected $pos;

  /** Part of the Iterator interface
   * iterates to the next element
   */
  public function next() {
    $this->pos++;
  }

  /** Part of the Iterator interface
   * iterates to the previois element
   */
  public function prev() {
    $this->pos--;
  }

  /** Part of the Iterator interface
   * rewinds the iterator to the first element
   */
  public function rewind() {
    $this->pos = 0;
  }

  /** Part of the Iterator interface
   * rewinds the iterator to the first element
   */
  public function valid() {
    return $this->pos < count($this->inputs);
  }

  /** Part of the Iterator interface
   * @return the current element
   */
  public function current() {
    return $this->inputs[$this->pos];
  }

  /** Part of the Iterator interface
   * @return the key of the current element
   */
  public function key() {
    return $this->pos;
  }

  /**
   * Adds an member to this group
   *
   * @param (InputfieldGroupMember) $input
   */
  public function add(InputfieldGroupMember $input) {
    $this->inputs[] = $input;
    $input->setName($this->getName());
  }

  /**
   * removes an member to this group
   *
   * @param (InputfieldGroupMember) $input
   */
  public function remove(InputfieldGroupMember $input) {
    foreach($this->inputs as $key => $i) {
      if($i === $input) {
        unset($this->inputs[$key]);
      }
    }
  }

  /**
   * Selects the an Added Member by the given value
   * 
   * @param (InputfieldGroupMember) $input
   */
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

  /**
   * Gets the value of the last selected element
   * 
   * @return (string)
   */
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
