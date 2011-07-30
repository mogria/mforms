<?php


class Textbox extends Inputfield {
  protected $maxlength;

  final public function getMaxlength()
  {
    return $this->maxlength;
  }

  public function setMaxlength($value)
  {
    $this->maxlength = $value;
  }

}
?>
