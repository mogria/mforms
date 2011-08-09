<?php


class Radio extends InputfieldOption {
  public function getType()
  {
    return "radio";
  }
  
  public function __construct($value) {
    parent::__construct("void");
    $this->setValue($value);
  }
}

