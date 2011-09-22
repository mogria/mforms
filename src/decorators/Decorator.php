<?php

abstract class Decorator {
  protected $object;
  protected $class;
  protected $surroundedby = null;

  public function setSurroundedBy(Decorator $surroundedby) {
    $this->surroundedby = $surroundedby;
  }
  
  public function getSurroundedBy() {
    return $this->surroundedby;
  }

  public function getClass() {
    return $this->class;
  }

  public function __construct($object) {
    $this->object = $object;
    if($object instanceof Decorator) {
      $this->class = $object->getClass();
      $this->object->setSurroundedBy($this);
    } else {
      $this->class = get_class($object);
    }
  }

  //@todo: contains the second parameter the params?
  public function __call($method, $params) {
    return call_user_func_array(array($this->object, $method), $params);
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
