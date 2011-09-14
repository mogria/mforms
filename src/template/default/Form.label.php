<?php

$inside = $this->object->display();


$description = (($description = $this->getDescription()) !== null) ?
  "<p class=\"description\">" . htmlspecialchars($description) . "</p>\n" :
  "\n";

$label = $this->getLabel();

$content = "<fieldset class=\"input " . htmlspecialchars($label) . "\">\n" . 
  self::tabindent("<legend>" . htmlspecialchars($label) . "</legend>\n" .
  $description . 
  $inside) . "\n";


