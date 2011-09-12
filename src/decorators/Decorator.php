<?php

abstract class Decorator {
  protected $object;
  protected $class;

  public function __construct($object) {
    $this->object= $object;
    if($object instanceof Decorator) {
      $this->class = $object->getClass();
    } else {
      $this->class = get_class($object);
    }
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

  public function getClass() {
    return $this->class;
  }

  /** public function __get($key) {
    return $this->object->{$key};
  }

  public function __set($key, $value) {
    return $this->object->{$key} = $value;
  }

  public function __isset($key) {
    return isset($this->object->{$key});
  }

  public function __unset($key) {
    unset($this->object->{$key});
  } */
}
