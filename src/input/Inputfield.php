<?php

abstract class Inputfield extends FormElement implements InputfieldInterface {
  protected $value;

  protected $disabled;

  protected $required;

  protected $valid = true;

  protected $checkers;

  public function __construct($name, $required = false) {
    parent::__construct($name);
    $this->setRequired($required);

    $this->checkers = new CheckerChain(Array());
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
   * Checks if the inputfield is valid
   *
   * @return (bool) 
   */
  public function isValid() {
    return $this->valid =
      ($this->getValue() !== null && $this->getValue() !== "") /** @todo: probably remove this !=== "" */
        ? $this->checkers->check()
        : !$this->getRequired();
  }
  
  /**
   * Register a Checker for this inputfield
   *
   * @param (Checker) $c : the checker
   */
  public function checkerRegister(Checker $c) {
    $this->checkers->add($c);
  }

  /**
   * Unregister a Checker for this inputfield
   *
   * @return (Checker) $c : the checker
   */
  public function checkerUnregister(Checker $c) {
    $this->checkers->remove($c);
  }
}

