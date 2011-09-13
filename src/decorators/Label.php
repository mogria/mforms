<?php

class Label extends InputfieldDecorator {
  protected $label;
  protected $description;

  public function getTemplateExtension() {
    return ".label";
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

  public function __construct(FormElement $object, $label, $description = null) {
    parent::__construct($object);
    $this->setLabel($label);
    $description !== null && $this->setDescription($description);
  }
}
