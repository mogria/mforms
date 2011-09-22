<?php
$output = "";

if($this != null) {
  foreach($this as $key => $input) {
    $output .= (/*$void = */$input->display()) . "\n";
    //print_r($void);
  }
}

$output = "<form" . self::getAttributeNodes($this->attributes) . ">\n" .
          self::tabindent($output) . "\n" .
          "</form>";

$content = $output;
