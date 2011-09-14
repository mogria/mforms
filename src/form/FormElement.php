<?php

abstract class FormElement implements FormElementInterface {

  protected $id;

  protected $class;

  protected $name;

  protected $label;

  protected $description;

  protected $attributes = Array('name', 'id', 'class');

  protected $template = null;

  protected $template_loader;

  /**
   * Returns the TemplateLoader
   *
   * @return TemplateLoader
   */
  public function getTemplateLoader() {
    return $this->template_loader;
  }

  /**
   * Set's the TemplateLoader
   *
   * @param value - TemplateLoader
   */
  public function setTemplateLoader(TemplateLoaderInterface $value) {
    $this->template_loader = $value;
  }

  /**
   * Konstruktor
   *
   * @param name - The Name of the FormElement
   */
  public function __construct($name) {
    $this->setName($name);
    $this->addAttributes();
    $this->setTemplateLoader(new TemplateLoader("default"));
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

  public abstract function isValid();

  /**
   * Displays the FormElement
   *
   * @return string - the HTML
   */
  public function display() {
    $class = get_called_class();
    if(($file = $this->getFirstTemplateFile($class)) === null) {
      throw new BadMethodCallException("no template found for " . get_called_class());
    }
    require $file;
    if(!isset($content)) {
      $content = "";
    }
    return $content;
  }

  public function getFirstTemplateFile($class, $file_suffix = "") {
    $file = $this->template_loader->getPathTo($class . $file_suffix);
    while(empty($file)) {
      $class = class_parents($class); 
      if(!is_array($class) || $class == null) {
        return null;
      } else {
        $class = current($class);
        $file = $this->template_loader->getPathTo($class . $file_suffix);
      }
    }
    return $file;
  }

  public static function tabindent($string, $indentby = 1) {
    $string = self::crlf2lf($string);
    $tabs = str_repeat("\t", $indentby);
    return $tabs . str_replace("\n", "\n" . $tabs, $string);
  }

  public static function crlf2lf($string) {
    return str_replace(Array("\r\n", "\r"), "\n", $string);
  }

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
}

