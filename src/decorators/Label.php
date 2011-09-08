<?php


class LabelDecorator extends Decorator {
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

  public function display() {
    $template_loader = $this->object->getTemplateLoader();
    $ext = $template_loader->getTemplateExtension();
    $this->object->display();
    /** create a template object and read the template in the themes folder correspondig to the FormElement assigned to */
    
    $template_loader->setTemplateExtension($ext);
  }

  public function __construct(FormElement $object) {
    parent::__construct($object);
  }
}
