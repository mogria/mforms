<?php


class Textbox extends Inputfield {
  protected $size;

  protected $maxlength;

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

}
?>
