<?php

class MIMETypeChecker extends IsFileChecker {
  
  protected $mime_types = Array();

  public function getMimeTypes() {
    return $this->mime_types;
  }

  public function setMimeTypes($value) {
    $this->mime_types = $value;
  }

  public function __construct(Array $fields, Array $mime_types) {
    parent::__construct($fields);
    $this->setMimeTypes($mime_types);
  }

  public function checkValue($value) {
    if(parent::checkValue($value)) {
      if(in_array(self::grabMIMEType($value['tmp_name']), $this->mime_types)) {
        return true;
      }
    }
    return false;
  }

  public static function grabMIMEType($file) {
    if(!is_file($file)) {
      throw new InvalidArgumentException("Param 1 has to be an existing file and '$file' is not");
    }

    $fileinfo = new finfo(FILEINFO_MIME);
    $mime_type = $fileinfo->file($file);
    $mime_type = explode(";", $mime_type);
    return $mime_type[0];
  }
}
