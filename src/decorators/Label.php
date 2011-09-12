<?php


class Label extends InputfieldDecorator {
  protected $label;
  protected $description;
  const TEMPLATE_EXT = ".label";
  protected $template_loader;

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

  public function display() {
    $template_loader = $this->object->getTemplateLoader();
    $ext = $template_loader->getTemplateExtension();
    $template_loader->setTemplateExtension(self::TEMPLATE_EXT);
    $class = $this->getClass();
    if(($file = $this->getFirstTemplateFile($class)) === null) {
      throw new BadMethodCallException("no template found for " . get_called_class());
    }
    $template_loader->setTemplateExtension($ext);
    require $file;
    if(!isset($content)) {
      $content = "";
    }
    return $content;
  }

  public function __construct(FormElement $object, $label, $description = null) {
    parent::__construct($object);
    $this->setLabel($label);
    $description !== null && $this->setDescription($description);
  }
}
