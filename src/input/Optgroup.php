<?php


class Optgroup extends InputfieldGroup implements InputfieldGroupMember {

  /**
   * returns the Attribute Type
   *
   * @return (string) ; "checkbox"
   */
  public function getType() {
    return "optgroup";
  }

  /** @todo: need this thing a get & set for selected???  */
  /** @todo: create template file for this  */
}
