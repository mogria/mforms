<?php

abstract class Decorator {
  protected $object;
  public function __construct($object) {
    $this->object= $object;
  }

  //@todo: contains the second parameter the params?
  public function __call($method, $params) {
    //if this class does not contain a function try to call it in the object
    if(method_exists($this->object, $method)) {
      return call_user_func_array(array($this->object, $method), $params);
    } else {
      //throw exception?
    }
  }
}
