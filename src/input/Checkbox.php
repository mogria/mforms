<?php


class Checkbox extends Inputfield {
  protected $checked;

  /**
   *  Adds the Attributes for this class to the Attributes list
   *
   */
  protected function addAttributes() {
    parent::addAttributes();
    $this->attributes[] = 'checked';
  }

  /**
   * Getter for Attribute checked
   *
   * @return (bool)
   */
  public function getChecked() {
    return $this->checked;
  }

  /**
   * Setter for Attribute checked
   *
   * @param (bool) : new value
   */
  public function setChecked($value) {
    $this->checked = $value;
  }

  /**
   * returns the Attribute Type
   *
   * @return (string) ; "checkbox"
   */
  public function getType() {
    return "checkbox";
  }
}

