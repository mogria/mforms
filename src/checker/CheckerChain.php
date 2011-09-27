<?php

abstract class CheckerChain extends Checker {

  protected $loperation;

  /**
   * add a new Checker to the Chain
   *
   * @param (Checker) $c : An instance of Checker
   */
  public function add($c) {
    if($c instanceof Checker) {
      $this->fields[] = $c;
    }
  }

  /**
   * Set the logical Operation which sould be used
   * 
   * @param (LogicalOperator) $l : An instance of LogicalOperator
   */
  public function setLogicalOperation(LogicalOperator $l) {
    $this->loperation = $l;
  }

  /**
   * Get the logical Operator
   *
   * @return (LogicalOperator) : An instance of LogicalOperator
   */
  public function getLogicalOperation() {
    return $this->loperation;
  }

  /** Constructor
   * Calls add() on each given Checker
   * Sets the LogicalOperator
   * If nothing given an AndOperator is used
   *
   * @param (Array) $checkers : Instances of Checker in an Array
   * @param (LogicalOperator) $operation : An Logical Opeator: default AndOpetator
   */
  public function __construct($checkers, $operation = null) {
    parent::__construct($checkers);
    if($operation === null) {
      $operation = new AndOperator();
    }
    $this->setOperation($operation);
  }

  /**
   * calls the check Method of each added Checker and Combines it's solution with the set LogicalOperator
   *
   * @return (bool) 
   */
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

