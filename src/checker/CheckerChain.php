<?php

abstract class CheckerChain extends Checker {

  protected $loperation;

  public function add($c) {
    if($c instanceof Checker) {
      $this->fields[] = $c;
    }
  }

  public function setLogicalOperation(LogicalOperator $l) {
    $this->loperation = $l;
  }

  public function getLogicalOperation() {
    return $this->loperation;
  }

  public function __construct($checkers, $operation = null) {
    parent::__construct($checkers);
    if($operation === null) {
      $operation = new AndOperator();
    }
    $this->setOperation($operation);
  }

  public function check() {
    $anz = count($this->fields = array_keys($this->fields));
    
    $last = $this->fields[0]->check();
    for($i = 1; $i < $anz; $i++) {
      $before = $this->fields[$i]->getAutotrigger();
      $this->fields[$i]->setAutotrigger(false);
      $last = $this->loperation->check($last, $this->fields[$i]->check());
      $this->fields[$i]->setAutotrigger($before);
    }
    return $last;
  }
}

