<?php


class Textarea extends Inputfield {
  protected $rows;

  protected $cols;

  /**
   *  Adds/removes the Attributes for this class to the Attributes list
   *
   */
  protected function addAttributes() {
    parent::addAttributes();
    $this->attributes[] = 'rows';
    $this->attributes[] = 'cols';
    unset($this->attributes[array_search('type', $this->attributes)]);
    unset($this->attributes[array_search('value', $this->attributes)]);
  }

  /**
   * Getter for Attribute rows
   *
   * @return (int)
   */
  public function getRows() {
    return $this->rows;
  }

  /**
   * Setter for Attribute rows
   *
   * @param (int) : new value
   */
  public function setRows($value) {
    $this->rows = $value;
  }

  /**
   * Getter for Attribute cols
   * 
   * @return (int)
   */
  public function getCols() {
    return $this->cols;
  }

  /**
   * Setter for Attribute cols
   *
   * @param (int) : new value
   */
  public function setCols($value) {
    $this->cols = $value;
  }

  /**
   * returns the Attribute Type
   *
   * @return (string) ; "checkbox"
   */
  public function getType() {
    return "textarea";
  }
}

