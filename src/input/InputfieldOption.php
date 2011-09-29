<?php

abstract class InputfieldOption extends Inputfield implements InputfieldGroupMember{

  protected $selected;

  /**
   * Getter for Attribute selected
   *
   * @return (bool)
   */
  public function getSelected() {
    return $this->selected;
  }

  /**
   * Setter for Attribute selected
   *
   * @param (bool) : new value
   */
  public function setSelected($value) {
    $this->selected = $value;
  }

  /**
   *  Adds the Attributes for this class to the Attributes list
   *
   */
  protected function addAttributes() {
    parent::addAttributes();
    $this->attributes[] = 'selected';
  }

  /** Constructor
   * Need to set a value
   * @param (string) $value
   */
  public function __construct($value) {
    parent::__construct(null);
    $this->setValue($value);
  }

}
