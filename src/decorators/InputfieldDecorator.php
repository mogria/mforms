<?php

abstract class InputfieldDecorator extends Decorator implements FormElementInterface, InputfieldInterface {
  
  abstract function getTemplateExtension();
  
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
    return $content;
  }

}
