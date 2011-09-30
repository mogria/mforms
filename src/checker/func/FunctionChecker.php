<?php

class FunctionChecker extends Checker {
  protected $callback;
  protected $params; /* @todo: create getters & setters? */
  protected $field_param_num;

  /** Constructor
   *
   * @param (Array) $field : Inputfields
   * @param (mixed) $callback : Callback
   * @param (Array) $params : Params which will be given to the callback
   * @param (int) $field_param_num : At which position of the params is the Value of the Inputfield (min. 1)
   */
  public function __construct(Array $fields, $callback, Array $params = Array(), $field_param_num = 1) {
    parent::__construct($fields);
    if(is_callable($callback)) {
      $this->callback = $callback;
    } else {
      throw new InvalidArgumentException("Param 2 'callback' has to be callable()");
    }
    $this->params = $params;
    if($field_param_num > 0) {
      $this->field_param_num = $field_param_num;
    } else {
      throw new InvalidArgumentException("Param 2 'field_param_num' has to be more than 0");
    }
  }

  /**
   * Calls the given callback with the given params
   *
   * @return (bool) : return value of the given callback converted to a bool
   */
  public function checkValue($value) {
    $params[$this->field_param_num - 1] = $value;
    return (bool)user_func_call_array($callback, $params);
  }
}
