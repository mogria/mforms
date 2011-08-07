<?php


class Textbox extends Inputfield {
  protected $size;

  protected $maxlength;

  protected $attributes = Array('type', 'name', 'value', 'id', 'disabled', 'class', 'size', 'maxlength');

  final public function getMaxlength()
  {
    return $this->maxlength;
  }

  public function setMaxlength($value)
  {
    $this->maxlength = $value;
  }

  public function getSize()
  {
    return $this->size;
  }

  public function setSize($value)
  {
    $this->size = $value;
  }

  public function getType()
  {
    return "text";
  }

  public function isValid()
  {
    $valid = parent::isValid();
    if($this->getMaxlength() !== null && strlen($this->getValue()) > $this->getMaxlength()) {
        $valid = false;
    }
    return $valid;
  }

}

