<?php


function _fix_magic_quotes_walk(&$value, $key) {
  $value = get_magic_quotes_gpc() ? stripslashes($value) : $value;
}

class Form extends FormElement {
  protected $action = "#";

  protected $method;

  protected $enctype;

  protected $inputfields;

  protected $names;

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

  public function add(Inputfield $inputfield)
  {
    $this->inputfields[] = $inputfield;
    end($this->inputfields)
    $this->names[$inputfield->getName()] = key($this->inputfields);
    if($inputfield instanceof Filechooser) {
        $this->setEnctype('multipart/form-data');
    }
  }

  public function remove($inputfield)
  {
    //Iterate each and search for eqal objects
    foreach($this->inputfields as $key => $input) {
        if($input === $inputfield) {
            //remove from array
            unset($this->inputfields[$key]);
            unset($this->names[$key]);
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

  public function catchRequestData()
  {
    $method = &$_GET;
    if(strtoupper($this->getMethod()) == "POST") {
        $method = &$_POST;
    } 
    foreach($this->inputfields as $input) {
      //@todo: what if Filechooser? or an image button with x and y coords?
      $converted = str_replace(".", "_", $input->getName());
  
      if(isset($method[$converted])) {
          $value = $method[$converted];
  
          //kill magic qoutes if there
          $array = array($value);
          array_walk_recursive($array, '_fix_magic_quotes_walk');
          $value = $array[0];
  
          $input->setValue($value);
      }
    }
  }

  public function getInputfieldByName($name) {
    return array_key_exists($name, $this->names) ? $this->inputfields[$this->names[$name]]: null ;
  }
}
