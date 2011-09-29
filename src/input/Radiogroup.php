<?php

class Radiogroup extends InputfieldGroup {

  //@todo create a template file for RadioGroup

  /**
   * returns the Attribute Type
   *
   * @return (string) ; "checkbox"
   */
  public function getType() {
    return "radiogroup";
  }
}

