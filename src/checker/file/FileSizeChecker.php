<?php

class FileSizeChecker extends IsFileChecker {
  protected $max_size;

  public function getMaxSize() {
    return $this->max_size;
  }

  public function setMaxSize($value) {
    $this->max_size = $value;
  }

  public function __construct(Array $fields, $max_size) {
    parent::__construct($fields);
    $this->setMaxSize($max_size);
  }

  public function checkValue($value) {
    if(parent::checkValue($value)) {
      if($value['file'] <= $this->max_size) {
        return true;
      }
    }
    return false;
  }
}
