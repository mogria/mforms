<?php


class Textarea extends Inputfield {
  protected $rows;

  protected $cols;

  protected $attributes = Array('name', 'rows', 'cols', 'id', 'disabled', 'class');

  public function getRows()
  {
    return $this->rows;
  }

  public function setRows($value)
  {
    $this->rows = $value;
  }

  public function getCols()
  {
    return $this->cols;
  }

  public function setCols($value)
  {
    $this->cols = $value;
  }

  public function display()
  {
    return $this->displayLabel("<textarea" . parent::getAttributeNodes($this->attributes) . ">" . htmlspecialchars($this->getValue()) . "</textarea>\n");
  }

  public function getType()
  {
    return "textarea";
  }

}

