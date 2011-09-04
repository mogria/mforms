<?php
$inside = $this->getDisplayedField();
$description = (($description = $this->getDescription()) !== null) ?
  "\t<p>" . htmlspecialchars($description) . "</p>\n" :
  "\n";

$output = (($label = $this->getLabel()) !== null) ?
  "<label class=\"input " . htmlspecialchars($this->getType()) . "\">\n" . 
  self::tabindent("<span>" . htmlspecialchars($label) . "</span>\n" . 
  $description . 
  $inside. "\n" . 
  (!$this->valid ? '<p class="errormsg">' . implode('</p>' . "\n" . '<p class="errormsg">', $this->getErrorMsgs()) . '</p>' : "")) . "\n" .
  "</label>\n" :
  $inside . "\n";

echo $output;
