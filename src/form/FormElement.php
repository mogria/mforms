<?php

abstract class FormElement {
  
  protected static $template_loader;

  /**
   * Returns the TemplateLoader
   *
   * @return TemplateLoader
   */
  public static function getTemplateLoader() {
    return $this->template_loader;
  }

  /**
   * Set's the TemplateLoader
   *
   * @param value - TemplateLoader
   */
  public static function setTemplateLoader(TemplateLoaderInterface $value) {
    $this->template_loader = $value;
  }

  protected $id;

  protected $class;

  protected $name;

  protected $label;

  protected $description;

  protected $attributes = Array('name', 'id', 'class');

  protected $template = null;

  /**
   * Konstruktor
   *
   * @param name - The Name of the FormElement
   */
  public function __construct($name) {
    $this->setName($name);
    $this->addAttributes();
  }

  /**
   * get the name of the template currently using
   *
   * @return string - name of the template
   */
  public function getTemplate() {
    return ($this->template === null) ? self::DEFAULT_TEMPLATE : $this->template;
  }

  /**
   * set the name of the template
   *
   * @param value - template name
   */
  public function setTemplate($value) {
    $this->template = $value;
  }

  abstract protected function addAttributes();

  final public function getName() {
    return $this->name;
  }

  public function setName($value) {
    $this->name = $value;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($value) {
    $this->id = $value;
  }

  public function getClass() {
    return $this->class;
  }

  public function setClass($value) {
    $this->class = $value;
  }

  public function getLabel() {
    return $this->label;
  }

  public function setLabel($value) {
    $this->label = $value;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setDescription($value) {
    $this->description = $value;
  }

  public abstract function isValid();

  public abstract function display() {
    return self::$template_loader->load(called_class());
  }

  public abstract function displayLabel($inside);

  public function getAttributeNodes($attributes) {
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

