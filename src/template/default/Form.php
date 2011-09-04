<?php
$output = "";
if($this->inputfields != null) {
  foreach($this as $input) {
    $output .= $input->display() . "\n";
  }
}
$output = $this->displayLabel($output);

$output = "<form" . parent::getAttributeNodes($this->attributes) . ">\n" .
          self::tabindent($output) . "\n" .
          "</form>";

echo $output;
