<?php


class LabelDecorator {
  protected $label;

  public function getLabel() {
    return $this->label;
  }

  public function setLabel($value) {
    $this->label = $value;
  }

  public function display() {
    die(__METHOD__ . " not implemented in " . __FILE__ . ":" . __LINE__);
    /** create a template object and read the template in the themes folder correspondig to the FormElement assigned to */
  }
}
