<?php

class FunctionChecker implements Checker {
  protected $fields;
  protected $callback;
  public function __construct(Array $fields, $callback, Array $params = Array(), $field_param_num = 1) {
    $this->fields = $fields;
    $this->callback = $callback;
    $this->field_param_num = $field_param_num;
  }

  public function check(Form $form) {
    $value = $form->getInputfieldByName($this->field);
    $params[$this->field_param_num - 1] = $value;
    $valid = true;
    foreach($fields as $field) {
      if(!user_func_call_array($callback, $params)) {
        $valid = false;
      }
    }
    return $valid;
  }
}
