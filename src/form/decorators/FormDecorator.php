<?php

abstract class FormDecorator {
  protected $form;
  public function __construct(Form $form) {
    $this->form = $form;
  }

  //@todo: contains the second parameter the params?
  public function __call($method, $params) {
    //if this class does not contain a function try to call it in the form object
    if(method_exists($this->form, $method)) {
      return call_user_func_array(array($this->form, $method), $params);
    } else {
      //throw exception?
    }
  }
}
