<?php

class FunctionChecker extends Checker {
  protected $callback;
  protected $params;
  protected $field_param_num;

  /**
   * Get one or all params
   *
   * @param (mixed) $num : number of param you want to get. If not set all params will be returned
   * @return (mixed) : one or all parameters
   */
  public function getParams($num = null) {
    if($num == null) {
      return $this->params;
    } elseif (isset($this->params[$num])) {
      return $this->params[$num];
    } else {
      throw new InvalidArgumentException("there is no param $num");
    }
  }

  /**
   * Set one or all params
   *
   * @param (mixed) $value : the new value(s), can be an array if $num == null
   * @param (mixed) $num : number of param you want to set. If not set all params will be set
   */
  public function setParams($value, $num = null) {
    if($num == null) {
      if(!is_array($value) {
        $value = array($value);
      }
      $this->params = $value;
    } else {
      $this->params[$num] = $value;
    }
  }

  /**
   * Get on which position the value of the Inputfield is used
   *
   * @return (int) : the position
   */
  public function getFieldParamNum() {
    return $this->field_param_num;
  }

  /**
   * Set on which position the value of the Inputfield is used
   *
   * @param (int) $value : the position
   */
  public function setFieldParamNum($value) {
    $this->field_param_num = (int)$value;
  }


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
