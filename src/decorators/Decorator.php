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

  public function __call($method, $params) {
    return call_user_func_array(array($this->object, $method), $params);
  }
}
