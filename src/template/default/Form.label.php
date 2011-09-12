<?php

$inside = $this->object->display();


$description = (($description = $this->getDescription()) !== null) ?
  "<p>" . htmlspecialchars($description) . "</p>\n" :
  "\n";

$output = (($label = $this->getLabel()) !== null) ?
  "<fieldset class=\"input " . htmlspecialchars($label) . "\">\n" . 
  self::tabindent("<legend>" . htmlspecialchars($label) . "</legend>\n" .
  $description . 
  $inside) . "\n" . 
  "</fieldset>\n" :
  $inside . "\n";


$content = $output;
