<?php


class Checkbox extends Inputfield {
  protected $checked;

  protected function addAttributes() {
    parent::addAttributes();
    $this->attributes[] = 'checked';
  }

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

