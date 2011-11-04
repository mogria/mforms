<?php


class Filechooser extends Inputfield {

  protected $location_filename;

  public function getLocationFilename() {
    return $this->location_filename;
  }

  public function setLocationFilename($value) {
    $this->location_filename = $value;
  }

  /**
   * returns the Attribute Type
   *
   * @return (string) ; "file"
   */
  public function getType() {
    return "file";
  }

  /**
   * if a file has been uploaded, so you can call
   * this function to validate that and move the file
   * to the correct location
   *
   * @param (string) $location_filename : the new location of the file
   */
  public function upload() {
    if($this->check()) {
      throw new BadMethodCallException("there is no uploaded file in value property!");
    } else {
      $value = $this->getValue();
      move_uploaded_file($value['tmp_name'],  $this->getLocationFilename());
    }
  }
}

