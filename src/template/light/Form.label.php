<?php

$inside = $this->object->display();


$description = (($description = $this->getDescription()) !== null) ?
  "<p>" . htmlspecialchars($description) . "</p>\n" :
  "\n";

$label = $this->getLabel();

$content = "<fieldset>\n" . 
  self::tabindent("<legend>" . htmlspecialchars($label) . "</legend>\n" .
  $description . 
  $inside) . "\n";


