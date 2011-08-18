<?php

class NorChecker extends NandChecker {
  public function __construct() {
    $this->checker = new NotChecker(new OrChecker(is_array(func_get_arg(0)) ? func_get_args(0) : func_get_args()));
  }
}
