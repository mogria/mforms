<?php

class ErrorMessage extends InputfieldDecorator {
  const TEMPLATE_EXT = ".errmsg";

  public function getTemplateExtension() {
    return ".errmsg";
  }

  protected $errormsgs = Array();

  public function getErrorMsgs() {
    return $this->errormsgs;
  }

  public function addErrorMsg($errormsg) {
    if($errormsgs != null) {
      if(!is_array($errormsg)) {
        $errormsg = Array($errormsg);
      }

      foreach($errormsg as $errmsg) {
        $this->errormsgs[] = $errmsg;
      }
    }
  }

  public function __construct(FormElement $object, $errormsgs= null) {
    parent::__construct($object);
    $this->addErrorMsg($errormsg);
  }
}
