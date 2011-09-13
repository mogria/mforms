<?php
$output = "";

if($this != null) {
  foreach($this as $key => $input) {
    $output .= $input->display() . "\n";
  }
}

$output = "<form" . self::getAttributeNodes($this->attributes) . ">\n" .
          self::tabindent($output) . "\n" .
          "</form>";

$content = $output;
