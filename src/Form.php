<?php

require_once './Inputfield.php';

class Form extends FormElement {
  protected $action = "#";

  protected $method;

  protected $enctype;

  protected $inputfields;

  protected $attributes = Array('name', 'action', 'method', 'enctype', 'id', 'class');

  final public function getAction()
  {
    return $this->action;
  }

  public function setAction($value)
  {
    $this->action = $value;
  }

  final public function getMethod()
  {
    return $this->method;
  }

  public function setMethod($value)
  {
    $this->method = $value;
  }

  public function getEnctype()
  {
    return $this->enctype;
  }

  public function setEnctype($value)
  {
    $this->enctype = $value;
  }

  public function add($inputfield)
  {
    $this->inputfields[] = $inputfield;
  }

  public function remove($inputfield)
  {
    //Iterate each and search for eqal objects
    foreach($this->inputfields as $key => $input) {
        if($input === $inputfield) {
            //remove from array
            unset($this->inputfields[$key]);
        }
    }
    
    //generate new keys
    $this->inputfields = array_values($this->inputfields);
  }

  public function display()
  {
    $output = "";
    if($this->inputfields != null) {
        foreach($this->inputfields as $input) {
            $output .= $input->display() . "\n";
        }
    }
    $output = $this->displayLabel($output);
    
    $output = "<form " . parent::getAttributeNodes($this->attributes) . ">\n" .
              "\t" . $output . "\n" .
              "</form>\n";
    
    return $output;
  }

  public function displayLabel($inside)
  {
    $description = (($description = $this->getDescription()) !== null) ?
        "\t\t<p>" . htmlspecialchars($description) . "</p>\n" :
        "\n";
    
    $output = (($label = $this->getLabel()) !== null) ?
        "<fieldset class=\"input " . htmlspecialchars($label) . "\">\n" . 
        "\t<legend>" . htmlspecialchars($label) . "</legend>\n" .
        $description . 
        "\t" . $inside . "\n" . 
        "</fieldset>\n" :
        $inside . "\n";
    return $output;
  }

  public function isValid()
  {
    $valid = true;
    foreach($this->inputfields as $input) {
        if(!$input->isValid()) {
            $valid = false;
        }
    }
    
    return $valid;
  }

}

