<?php


abstract class Inputfield extends FormElement {
  protected $value;

  final public function getValue()
  {
    return $this->value;
  }

  public function setValue($new_value)
  {
    $this->value = $new_value;
  }

  public function display()
  {
    return $this->displayLabel("<input" . parent::getAttributeNodes(array('type', 'name', 'value')) . " />\n");
  }

  public function isValid()
  {
  }

  public function displayLabel($inside)
  {
    
    $description = (($description = $this->getDescription()) !== null) ?
        "\t<p>" . htmlspecialchars($description) . "</p>\n" :
        "\n";
    
    $output = (($label = $this->getLabel()) !== null) ?
        "<label class=\"input " . htmlspecialchars($this-getType()) . "\">\n" . 
        $description . 
        "\t" . $inside . "\n" . 
        "</label>\n" :
        $inside . "\n";
    return $output;
  }

  public abstract function getType()
  ;
}
?>
