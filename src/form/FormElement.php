<?php

abstract class FormElement {
  
  protected static $template_loader;

  /**
   * Returns the TemplateLoader
   *
   * @return TemplateLoader
   */
  public static function getTemplateLoader() {
    return self::$template_loader;
  }

  /**
   * Set's the TemplateLoader
   *
   * @param value - TemplateLoader
   */
  public static function setTemplateLoader(TemplateLoaderInterface $value) {
    self::$template_loader = $value;
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

  /**
   * get the name of the FormElement
   *
   * @return string - the name of the FormElement
   */
  public function getName() {
    return $this->name;
  }

  /**
   * set the name of the FormElement
   *
   * @param value - the new name of the FormElement
   */
  public function setName($value) {
    $this->name = $value;
  }

  /**
   * get the id of the FormElement
   *
   * @return string - id of the FormElement
   */
  public function getId() {
    return $this->id;
  }

  /**
   * set the id of the FormElement
   *
   * @param string - the new id of the FormElement
   */
  public function setId($value) {
    $this->id = $value;
  }

  /**
   * get the class of the FormElement
   *
   * @return string - class of the FormElement
   */
  public function getClass() {
    return $this->class;
  }

  /**
   * set the class of the FormElement
   *
   * @param string - the new class of the FormElement
   */
  public function setClass($value) {
    $this->class = $value;
  }

  /**
   * get the label of the FormElement
   *
   * @return string - label of the FormElement
   */
  public function getLabel() {
    return $this->label;
  }

  /**
   * set the label of the FormElement
   *
   * @param string - the new label of the FormElement
   */
  public function setLabel($value) {
    $this->label = $value;
  }

  /**
   * get the description of the FormElement
   *
   * @return string -  description of the FormElement
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * set the description of the FormElement
   *
   * @param string - the new description of the FormElement
   */
  public function setDescription($value) {
    $this->description = $value;
  }

  public abstract function isValid();

  /**
   * Displays the FormElement
   *
   * @return string - the HTML
   */
  public function display() {
    return self::$template_loader->load(called_class());
  }

  public abstract function displayLabel($inside);

  /**
   * Returns a string with the attribute nodes for an HTML element
   *
   * @param attributes - Array containing attribute names
   * @return string - generated attributes
   */
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

