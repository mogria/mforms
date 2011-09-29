<?php

abstract class Inputfield extends FormElement implements InputfieldInterface {
  protected $value;

  protected $disabled;

  protected $required;

  protected $match;

  protected $valid = true;

  public function __construct($name, $required = false, $match = "/.*/") {
    parent::__construct($name);
    $this->setRequired($required);
    $this->setMatch($match); //@todo: not needed anymore
  }

  /**
   *  Adds the Attributes for this class to the Attributes list
   *
   */
  protected function addAttributes() {
    $this->attributes[] = 'value';
    $this->attributes[] = 'type';
    $this->attributes[] = 'disabled';
  }

  /**
   * Getter for Attribute value
   *
   * @return (string)
   */
  public function getValue() {
    return $this->value;
  }

  /**
   * Setter for Attribute value
   *
   * @param (string) : new value
   */
  public function setValue($value) {
    $this->value = $value;
  }

  /**
   * Getter for Attribute value
   *
   * @return (string)
   */
  public function getDisabled() {
    return $this->disabled;
  }

  /**
   * Setter for Attribute value
   *
   * @param (string) : new value
   */
  public function setDisabled($value) {
    $this->disabled = $value;
  }

  /**
   * Getter for Attribute value
   *
   * @return (string)
   */
  public function getRequired() {
    return $this->required;
  }

  /**
   * Setter for Attribute value
   *
   * @param (string) : new value
   */
  public function setRequired($value) {
    $this->required = $value;
  }

  /**
   * Getter for Attribute value
   *
   * @return (string)
   */
  public function getMatch() {
    return $this->match;
  }

  /**
   * Setter for Attribute value
   *
   * @param (string) : new value
   */
  public function setMatch($value) {
    $this->match = $value;
  }

  /**
   * Checks if the inputfield is valid
   *
   * @return (bool) 
   */
  public function isValid() {
    $valid = true;
    if($this->getValue() !== null && $this->getValue() !== "") {
      $valid = (bool)preg_match($this->getMatch(), $this->getValue());
    } else {
      $valid = !$this->getRequired();
    }
    $this->valid = $valid;
    return $valid;
  }
}

