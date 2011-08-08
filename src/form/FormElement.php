<?php


abstract class FormElement {
  protected $id;

  protected $class;

  protected $name;

  protected $label;

  protected $description;

  protected $attributes = Array('name', 'id', 'class');

  public function __construct($name)
  {
    $this->setName($name);
  }

  final public function getName()
  {
    return $this->name;
  }

  public function setName($value)
  {
    $this->name = $value;
  }

  final public function getId()
  {
    return $this->id;
  }

  public function setId($value)
  {
    $this->id = $value;
  }

  public function getClass()
  {
    return $this->class;
  }

  public function setClass($value)
  {
    $this->class = $value;
  }

  final public function getLabel()
  {
    return $this->label;
  }

  public function setLabel($value)
  {
    $this->label = $value;
  }

  final public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($value)
  {
    $this->description = $value;
  }

  public abstract function isValid()
  ;
  public abstract function display()
  ;
  public abstract function displayLabel($inside)
  ;
  public function getAttributeNodes($attributes)
  {
    $output = "";
    foreach($attributes as $attr) {
        $methodname = "get" . ucfirst(strtolower($attr));
        if(method_exists($this, $methodname)) {
            $ret = $this->{$methodname}();
            if($ret !== null && $ret !== false) {
                $output .= " " . htmlspecialchars($attr) . "=\"" . (($ret !== true) ? htmlspecialchars($ret) : htmlspecialchars($attr)) . "\"";
            }
        }
    }
    
    return $output;
  }

  public function __toString() {
    return $this->display();
  }
}

