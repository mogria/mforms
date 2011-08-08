<?php


class Option extends InputfieldOption {
  private $selected;

  public function getSelected()
  {
    return $this->selected;
  }

  public function setSelected($value)
  {
    $this->selected = $value;
  }

}

