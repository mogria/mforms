<?php


abstract class Inputfield extends FormElement {
  protected $value;

  protected $disabled;

  protected $required;

  protected $match;

  protected $attributes = Array('type', 'name', 'value', 'id', 'disabled', 'class');

  public function __construct($name, $required = false, $match = "/.*/")
  {
    parent::__construct($name);
    $this->setRequired($required);
    $this->setMatch($match);
  }

  final public function getValue()
  {
    return $this->value;
  }

  public function setValue($new_value)
  {
    $this->value = $new_value;
  }

  public function getDisabled()
  {
    return $this->disabled;
  }

  public function setDisabled($value)
  {
    $this->disabled = $value;
  }

  public function getRequired()
  {
    return $this->required;
  }

  public function setRequired($value)
  {
    $this->required = $value;
  }

  public function getMatch()
  {
    return $this->match;
  }

  public function setMatch($value)
  {
    $this->match = $value;
  }

  public function display()
  {
    return $this->displayLabel("<input" . parent::getAttributeNodes($this->attributes) . " />\n");
  }

  public function isValid()
  {
    $valid = true;
    if($this->getValue() !== null) {
        $valid = (bool)preg_match($this->getMatch(), $this->getValue());
    } else {
        $valid = !$this->getRequired();
    }
    return $valid;
  }

  public function displayLabel($inside)
  {
    
    $description = (($description = $this->getDescription()) !== null) ?
        "\t<p>" . htmlspecialchars($description) . "</p>\n" :
        "\n";
    
    $output = (($label = $this->getLabel()) !== null) ?
        "<label class=\"input " . htmlspecialchars($this->getType()) . "\">\n" . 
        "\t<span>" . htmlspecialchars($label) . "</span>\n" . 
        $description . 
        "\t" . $inside . "\n" . 
        "</label>\n" :
        $inside . "\n";
    return $output;
  }

  public abstract function getType()
  ;
}

