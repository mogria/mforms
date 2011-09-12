<?php

abstract class Inputfield extends FormElement implements InputfieldInterface {
  protected $value;

  protected $disabled;

  protected $required;

  protected $match;

  protected $errormsgs = Array();

  protected $valid = true;

  public function __construct($name, $required = false, $match = "/.*/") {
    parent::__construct($name);
    $this->setRequired($required);
    $this->setMatch($match);
  }

  protected function addAttributes() {
    $this->attributes[] = 'value';
    $this->attributes[] = 'type';
    $this->attributes[] = 'disabled';
  }

  public function getValue() {
    return $this->value;
  }

  public function setValue($value) {
    $this->value = $value;
  }

  public function getDisabled() {
    return $this->disabled;
  }

  public function setDisabled($value) {
    $this->disabled = $value;
  }

  public function getRequired() {
    return $this->required;
  }

  public function setRequired($value) {
    $this->required = $value;
  }

  public function getMatch() {
    return $this->match;
  }

  public function setMatch($value) {
    $this->match = $value;
  }

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

  public function getErrorMsgs() {
    return $this->errormsgs;
  }

  public function addErrorMsg($msg) {
    $this->errormsgs[] = $msg;
  }
}

