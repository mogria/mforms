<?php


class Checkbox extends Inputfield {
  protected $checked;

  protected $attributes = Array('type', 'name', 'value', 'id', 'disabled', 'class', 'checked');

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

