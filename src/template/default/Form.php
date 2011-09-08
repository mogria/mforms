<?php
$output = "";
if($this->inputfields != null) {
  foreach($this as $key => $input) {
    $output .= "$key : " . $input->display() . "\n";
  }
}
//$this->displayed_field = $output;
$output = $this->displayLabel();

$output = "<form" . self::getAttributeNodes($this->attributes) . ">\n" .
          self::tabindent($output) . "\n" .
          "</form>";

$content = $output;
