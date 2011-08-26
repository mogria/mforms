<?php


function _fix_magic_quotes_walk(&$value, $key) {
  $value = get_magic_quotes_gpc() ? stripslashes($value) : $value;
}

class Form extends FormElement implements Iterator {

  const SENT_INPUT = "__mforms_sent";
  protected $action = "#";

  protected $method;

  protected $enctype;

  protected $inputfields = Array();

  protected $names;

  protected $checker = Array();

  protected $pos;

  public function next() {
    $this->pos++;
  }

  public function prev() {
    $this->pos--;
  }

  public function rewind() {
    $this->pos = 0;
  }

  public function valid() {
    return $this->pos < count($this->names);
  }

  public function current() {
    return $this->{$this->inputfields[$this->names[$this->pos]}
  }

  public function key() {
    return $this->pos;
  }

  /**
   * Adds some Attributes to the base attributes defined in the FormElement class
   *
   * @access protected
   */
  protected function addAttributes() {
    $this->attributes[] = 'action';
    $this->attributes[] = 'method';
    $this->attributes[] = 'enctype';
  }

  /**
   * constructor
   *
   * @access public
   * @param name - the name of the form (default NULL)
   * @param action - the action of the form (default "#")
   * @param method - the method of the form ("get" or "post" default "post")
   */
  public function __construct($name = null, $action = '#', $method = 'post') {
    parent::__construct($name);
    $this->setAction($action);
    $this->setMethod($method);
    $sent = new Hidden(self::SENT_INPUT, true);
    $sent->setValue("1");
    $this->add($sent);
  }

  /**
   * Getter for property action
   *
   * @access public
   * @return string - the current action of the form
   */
  public function getAction() {
    return $this->action;

  }

  /**
   * Setter for property action
   *
   * @access public
   * @param value - the action of the form
   */
  public function setAction($value) {
    $this->action = $value;
  }

  /**
   * Getter for property action
   *
   * @access public
   * @return the action of the form
   */
  public function getMethod() {
    return $this->method;
  }

  /**
   * Setter for property method
   *
   * @access public
   * @param value - the action of the form
   */
  public function setMethod($value) {
    $this->method = $value;
  }

  /**
   * Getter for property enctype
   *
   * @access public
   * @return the action of the form
   */
  public function getEnctype() {
    return $this->enctype;
  }
 
  /**
   * Setter for property enctype
   *
   * @access public
   * @param value - the new enctype of the form
   */
  public function setEnctype($value) {
    $this->enctype = $value;
  }

  /**
   * Add an Inputfield to the form
   *
   * @param Inputfield - an Inputfield
   */
  public function add(Inputfield $inputfield) {
    $this->inputfields[] = $inputfield;
    end($this->inputfields);
    $this->names[$inputfield->getName()] = key($this->inputfields);
    if($inputfield instanceof Filechooser) {
      $this->setEnctype('multipart/form-data');
    }
  }

  /**
   * Remove an Inputfield from the form
   *
   * @param Inputfield - an Inputfield
   */
  public function remove($inputfield) {
    //Iterate each and search for eqal objects
    foreach($this->inputfields as $key => $input) {
      if($input === $inputfield) {
        //remove from array
        unset($this->inputfields[$key]);
        unset($this->names[$inputfield->getName()]);
      }
    }
    
    //generate new keys
    $this->inputfields = array_values($this->inputfields);
  }

  /**
   * display's the form and all the Inputfield's added
   *
   * @return HTML of the form
   */
  public function display() {
    $output = "";
    if($this->inputfields != null) {
      foreach($this->inputfields as $input) {
        $output .= $input->display() . "\n";
      }
    }
    $output = $this->displayLabel($output);
    
    $output = "<form " . parent::getAttributeNodes($this->attributes) . ">\n" .
              "\t" . $output . "\n" .
              "</form>\n";
    
    return $output;
  }

  /**
   * display's the label of the form and the given content
   *
   * @param inside - what should be displayed inside the label
   * @return HTML of the label of the form
   */
  public function displayLabel($inside) {
    $description = (($description = $this->getDescription()) !== null) ?
      "\t\t<p>" . htmlspecialchars($description) . "</p>\n" :
      "\n";
    
    $output = (($label = $this->getLabel()) !== null) ?
      "<fieldset class=\"input " . htmlspecialchars($label) . "\">\n" . 
      "\t<legend>" . htmlspecialchars($label) . "</legend>\n" .
      $description . 
      "\t" . $inside . "\n" . 
      "</fieldset>\n" :
      $inside . "\n";
    return $output;
  }

  /**
   * Checks if the entered Values in the Form are valid
   *
   * @return boolean sigifiing if form is filled with valid data
   */
  public function isValid() {
    $valid1 = true;
    foreach($this->inputfields as $input) {
      if(!$input->isValid()) {
        $valid1 = false;
      }
    }
    
    $valid2 = true;
    foreach($this->checker as $checker) {
      $checker->setForm($this);
      if(!$checker->check()) {
        $valid2 = false;
      }
    }
    return $valid1 && $valid2;
  }

  /**
   * Get's all the data in $_GET or $_POST and fills the data into the corresponding Inpufield added to the form
   *
   */
  public function catchRequestData() {
    $method = &$_GET;
    if(strtoupper($this->getMethod()) == "POST") {
      $method = &$_POST;
    } 
    foreach($this->inputfields as $input) {
      //@todo: what if Filechooser? or an image button with x and y coords?
      $converted = str_replace(".", "_", $input->getName());
  
      if(isset($method[$converted])) {
        $value = $method[$converted];
  
         //kill magic qoutes if there
        $array = array($value);
        array_walk_recursive($array, '_fix_magic_quotes_walk');
        $value = $array[0];
  
        $input->setValue($value);
      }
    }
  }

  /**
   * Returns the Inputfield which has given Name
   *
   * @param name - name of the Inputfield you want
   * @return Inputfield with the given name
   */
  public function getInputfieldByName($name) {
    return array_key_exists($name, $this->names) ? $this->inputfields[$this->names[$name]]: null ;
  }
  
  /**
   * Check's if the user sent the form
   *
   * @return boolean signifiing if the Form has been sent
   */
  public function sent() {
    return !empty($_POST[self::SENT_INPUT]);
  }

  /**
   * Adds a Checker to the Form
   *
   * @param c - Checker
   */
  public function addChecker($c) {
    if($c instanceof Checker || $c instanceof ChainChecker) {
      $this->checker[] = $c;
      return true;
    } else {
      return false;
    }
  }

  /**
   * Removes a Checker from the Form
   *
   * @param c - Checker
   */
  public function removeChecker($c) {
    if($key = array_search($c, $this->checker, true)) {
      unset($this->checker[$key]);
    }
    return (bool)$key;
  }

  public function __get($key) {
    return $this->getInputfieldByName($key);
  }
}
