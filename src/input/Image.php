<?php


class Image extends Inputfield {
  protected $src;

  protected $alt;

  public function getSrc()
  {
    return $this->src;
  }

  protected function addAttributes() {
    parent::addAttributes();
    $this->attributes[] = 'src';
    $this->attributes[] = 'alt';
  }

  public function setSrc($value)
  {
    $this->src = $value;
  }

  public function getAlt()
  {
    return $this->alt;
  }

  public function setAlt($value)
  {
    $this->alt = $value;
  }

  public function getType()
  {
    return "image";
  }

}

