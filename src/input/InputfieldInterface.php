<?php

interface InputfieldInterface {
  public function getValue();
  public function setValue($value);
  public function getDisabled();
  public function setDisabled($value);
  public function getRequired();
  public function setRequired($value);
  public function getType();
}
