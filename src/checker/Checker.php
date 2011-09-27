<?php

abstract class Checker {

  protected $errmsg = null;
  protected $fields = Array();

  protected $autotrigger = true;

  protected $form;

  /**
   * Get if errors should be triggered automaticly by calling the check-Method
   *
   * @return (bool) : true when autotriggered, false if not
   */
  public function getAutotrigger() {
    return $this->autotrigger;
  }

  /**
   * Set if errors should be triggered automaticly by calling the check-Method
   *
   * @param (bool) $value 
   */
  public function setAutotrigger($value) {
    $this->autotrigger = $value;
  }

  /** 
   *  Remove an added Inputfield
   *
   * @param (InputfieldInterface) $c : Inputfield/Value which should be removed from the list
   */
  public function remove($c) {
    foreach($this->fields as $key => $member) {
      if($this->fields === $member) {
        unset($this->fields[$key]);
        return;
      }
    }
  }

  /** 
   *  Add an Inputfield
   *
   * @param (mixed) $c : Inputfield/Value which should be added to the list
   */
  public function add($c) {
     if($c instanceof InputfieldInterface) {
      $this->fields[] = $c;
    }
  }

  /**
   * Get the form to which this Checker is attached
   *
   * @return (Form) : The form
   */
  public function getForm() {
    return $this->form;
  }

  /**
   * Set the form to which this Checker is attached
   *
   * @param (Form) $form : The form
   */
  public function setForm($form) {
    $this->form = $form;
  }

  /**
   * Get the Error Message
   *
   * @return (string) : The Error Message
   */
  public function getErrmsg() {
    return $this->errmsg;
  }

  /**
   * Set the Error Message
   *
   * @param (string) $value : The Error Message
   */
  public function setErrmsg($value) {
    $this->errmsg = $value;
  }

  /**
   * Iterates each Check functions and Calls checkValue()
   * Triggers an Error Message on the Inputfield on failure and if Autotrigger is set to TRUE
   */
  public function check() {
    //go through each
    foreach($this->fields as $field) {
      //check the value
      $value = ($field instanceof InputfieldInterface ) ?
        $field->getValue() :
        $field;
      if (!($ret = $this->checkValue($value)) && $this->getAutotrigger() && $field instanceof InputfieldInterface) {
        //Set Errmsg on failure and autotrigger is turned on
        $this->triggerErrorMsg($field);
      }
    }
  }

  /**
   * triggers an error to the Inputfield
   *
   * @param (&InputfieldInterface) $input : The Error Message set will be attached to this Inputfield 
   */
  public function triggerErrorMsg(InputfieldInterface &$input) {
    if(($msg = $this->getErrmsg()) != null) {
      $input = new ErrorMessage($input, $msg);
    }
  }

  abstract public function checkValue($value);

  /** Constructor
   * Adds some Inputfields
   *
   * @param (mixed) $field: An Array or an Single Inputfield
   */
  public function __construct($fields) {
    //make $fields to an array and save it in the property $fields
    if(is_array($fields)) {
      foreach($fields as $f) {
        $this->add($f); 
      }
    } else {
      $this->add($fields);
    }
  }
}
