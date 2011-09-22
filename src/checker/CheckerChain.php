<?php

abstract class CheckerChain {

  protected $errormsg;
  protected $member = Array();
  protected $loperation;

  public function getErrormsg() {
    return $this->errormsg;
  }

  public function setErrormsg($value) {
    $this->errormsg = $value;
  }

  public function remove($c) {
    foreach($this->member as $key => $member) {
      if($this->member === $member) {
        unset($this->member[$key]);
      }
    }
  }

  public function add($c) {
    if($c instanceof CheckerChain || $c instanceof Checker) {
      $this->member[] = $c;
    }
  }

  public function setLogicalOperation(LogicalOperator $l) {
    $this->loperation = $l;
  }

  public function getLogicalOperation() {
    return $this->loperation;
  }

  public function __construct(Array $chain, $operation = null) {
    foreach($chain as $member) {
      $this->add($member);
    }
    if($operation === null) {
      $operation = new AndOperator();
    }
    $this->setOperation($operation);
  }

  public function check() {
    $anz = count($this->member = array_keys($this->member));
    
    $last = $this->member[0]->check();
    for($i = 1; $i < $anz; $i++) {
      $before = $this->member[$i]->getAutotrigger();
      $this->member[$i]->setAutotrigger(false);
      $last = $this->loperation->check($last, $this->member[$i]->check());
      $this->member[$i]->setAutotrigger($before);
    }
    return $last;
  }
}
