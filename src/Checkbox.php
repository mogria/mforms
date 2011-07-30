<?php


class Checkbox extends Inputfield {
  private $checked;

  final public function getChecked()
  {
    return $this->checked;
  }

  public function setChecked($value)
  {
    $this->checked = $value;
  }

  public function getType()
  {
    return "checkbox";
  }

}
?>
