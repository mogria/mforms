<?php

class FunctionChecker extends Checker {
  protected $callback;
  protected $params;
  public function __construct(Array $fields, $callback, Array $params = Array(), $field_param_num = 1) {
    parent::__construct($fields);
    $this->callback = $callback;
    $this->params = $params;
    $this->field_param_num = $field_param_num;
  }

  public function checkValue($value) {
    $params[$this->field_param_num - 1] = $value;
    return user_func_call_array($callback, $params);
  }
}
