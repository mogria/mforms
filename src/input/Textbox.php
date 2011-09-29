<?php


class Textbox extends Inputfield {
  protected $size;

  protected $maxlength;

  /**
   *  Adds the Attributes for this class to the Attributes list
   *
   */
  protected function addAttributes() {
    parent::addAttributes();
    $this->attributes[] = 'size';
    $this->attributes[] = 'maxlength';
  }

  /**
   * Getter for Attribute maxlength
   * 
   * @return (int)
   */
  public function getMaxlength() {
    return $this->maxlength;
  }

  /**
   * Getter for Attribute maxlength
   * 
   * @return (int)
   */
  public function setMaxlength($value) {
    $this->maxlength = $value;
  }

  /**
   * Getter for Attribute size
   * 
   * @return (int)
   */
  public function getSize() {
    return $this->size;
  }

  /**
   * Getter for Attribute size
   * 
   * @return (int)
   */
  public function setSize($value) {
    $this->size = $value;
  }

  /**
   * returns the Attribute Type
   *
   * @return (string) ; "checkbox"
   */
  public function getType() {
    return "text";
  }

  /**
   * Checks if the inputfield is valid includes the maxlength
   *
   * @return (bool) 
   */
  public function isValid() {
    $valid = parent::isValid();
    if($this->getMaxlength() !== null && strlen($this->getValue()) > $this->getMaxlength()) {
        $valid = false;
    }
    return $valid;
  }

}

