<?php

class FileExtensionChecker extends IsFileChecker {
  
  protected $extensions;

  public function getExtensions() {
    return $this->extensions;
  }

  public function setExtensions($value) {
    $this->extensions = $value;
  }

  public function __construct(Array $inputs, Array $extensions) {
    parent::__construct($inputs);
    $this->extensions = $extensions;
  }

  public function checkValue($value) {
    if(parent::checkValue($value)) {
      echo "i: " . $value['tmp_name'] . "\n";
      echo "o: " . $this->getFileExtension($value['tmp_name']) . "\n";
      return in_array($this->getFileExtension($value['tmp_name']), $this->extensions);
    } 
    return false;
  }
  
  public static function getFileExtension($filename) {
    if(($pos = strrpos($filename, ".")) !== false) {
      return substr($filename,  $pos + 1);
    } else {
      return "";
    }
  }
}
