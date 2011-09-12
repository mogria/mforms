<?php

abstract class InputfieldDecorator extends Decorator implements InputfieldInterface {
  public function getValue() {
    return $this->object->getValue();
  }

  public function setValue($value) {
    return $this->object->setValue($value);
  }

  public function getDisabled() {
    return $this->object->getDisabled();
  }

  public function setDisabled($value) {
    return $this->object->setDisabled($value);
  }

  public function getRequired() {
    return $this->object->getRequired();
  }

  public function setRequired($value) {
    return $this->object->setRequired($value);
  }

  public function getType() {
    return $this->object->getType();
  }

  public function getErrorMsgs() {
    return $this->object->getErrorMsgs();
  }

  public function addErrorMsg($errmsg) {
    return $this->object->addErrorMsg($errmsg);
  }
}
