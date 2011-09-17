<?php


class Select extends InputfieldGroup {

  protected $multiple;

  public function getType() {
    return "select";
  }

  public function addAttributes() {
    $this->attributes[] = 'multiple';
  }

  public function setMultiple($multiple) {
    $this->multiple = $multiple;
  }

  public function getMultiple() {
    return $this->multiple;
  }
}

