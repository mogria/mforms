<?php

abstract class InputfieldDecorator extends Decorator implements FormElementInterface, InputfieldInterface {
  
  abstract function getTemplateExtension();

  private static $displaycount = 0;
  protected $cache = Array();
  
  public function getValue() {
    return $this->object->getValue();
  }

  public function setValue($value) {
    return $this->object->setValue($value);
  }

  public function getDisabled() {
    return $this->object->getDisabled();
  }

  public function setDisabled($value) {
    return $this->object->setDisabled($value);
  }

  public function getRequired() {
    return $this->object->getRequired();
  }

  public function setRequired($value) {
    return $this->object->setRequired($value);
  }

  public function getType() {
    return $this->object->getType();
  }

  public function display() {
    $template_loader = $this->object->getTemplateLoader();
    $ext = $template_loader->getTemplateExtension();
    $template_loader->setTemplateExtension($this->getTemplateExtension());
    $class = $this->getClass();
    if(($file = $this->getFirstTemplateFile($class)) === null) {
      throw new BadMethodCallException("no template found for " . $class);
    }
    $template_loader->setTemplateExtension($ext);
    require $file;
    if(!isset($content)) {
      $content = "";
    }
    $this->cache[$this->getTemplateExtension()] = $content;
    self::$displaycount++;
    if($this->object instanceof InputfieldDecorator) {
      $this->cache = array_merge($this->cache, $this->object->display());
    } else {
      $this->cache = array_merge($this->cache, array('main' => $this->object->display()));
    }
    self::$displaycount--;
    if(self::$displaycount === 0) {
      foreach($this->cache as $key => &$element) {
        foreach($this->cache as $key2 => $element2) {
          $element = str_replace('{<' . $key2 . '>}', $element2, $element);
        }
      }
      
      $first = true;
      foreach($this->cache as $key => &$value) {
        $value = preg_replace("/{<\"[0-9a-z]*\">}/Ui", "", $value);
        if($first) {
          $max = strlen($value);
          $max_idx = $key;
          $first = false; 
        } else {
          if(strlen($value) > $max) {
            $max = strlen($value);
            $max_idx = $key;
          }
        }
      }
      return $this->cache[$max_idx];
    } else {
      return $this->cache;
    }
  }
}
