<?php


class Select extends InputfieldGroup {

  protected $multiple;

  /**
   * returns the Attribute Type
   *
   * @return (string) ; "checkbox"
   */
  public function getType() {
    return "select";
  }

  /**
   *  Adds the Attributes for this class to the Attributes list
   *
   */
  public function addAttributes() {
    $this->attributes[] = 'multiple';
  }

  /**
   * Getter for Attribute multiple
   *
   * @return (bool)
   */
  public function setMultiple($multiple) {
    $this->multiple = $multiple;
  }

  /**
   * Setter for Attribute multiple
   *
   * @param (bool) : new value
   */
  public function getMultiple() {
    return $this->multiple;
  }
}

