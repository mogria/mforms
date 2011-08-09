<?php


class Textarea extends Inputfield {
  protected $rows;

  protected $cols;

  public function getRows()
  {
    return $this->rows;
  }

  protected function addAttributes() {
    parent::addAttributes();
    $this->attributes[] = 'rows';
    $this->attributes[] = 'cols';
    unset($this->attributes[array_search('type', $this->attributes)]);
    unset($this->attributes[array_search('value', $this->attributes)]);
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

