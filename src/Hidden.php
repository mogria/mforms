<?php


class Hidden extends Inputfield {
  protected $attributes = Array('type', 'name', 'value', 'id', 'class');

  public function getType()
  {
    return "hidden";
  }

  public function displayLabel($inside)
  {
    return $inside;
  }

}

