<?php


class Hidden extends Inputfield {
  public function getType()
  {
    return "hidden";
  }

  public function displayLabel($inside)
  {
    return $inside;
  }

}
?>
