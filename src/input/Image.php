<?php


class Image extends Inputfield {
  protected $src;

  protected $alt;

  /**
   * Getter for Attribute src
   *
   * @return (string)
   */
  public function getSrc() {
    return $this->src;
  }

  /**
   *  Adds the Attributes for this class to the Attributes list
   *
   */
  protected function addAttributes() {
    parent::addAttributes();
    $this->attributes[] = 'src';
    $this->attributes[] = 'alt';
  }

  /**
   * Setter for Attribute src
   *
   * @param (string) : new value
   */
  public function setSrc($value) {
    $this->src = $value;
  }

  /**
   * Setter for Attribute alt
   *
   * @param (string) : new value
   */
  public function getAlt()
  {
    return $this->alt;
  }

  /**
   * Setter for Attribute alt
   *
   * @param (string) : new value
   */
  public function setAlt($value)
  {
    $this->alt = $value;
  }

  /**
   * returns the Attribute Type
   *
   * @return (string) ; "hidden"
   */
  public function getType() {
    return "image";
  }
}

