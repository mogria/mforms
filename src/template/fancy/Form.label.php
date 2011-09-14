<?php

$inside = $this->object->display();

$classes = "label formlabel label_" . $this->getName() . " " . $this->getName();

$classes = htmlspecialchars($classes);
$description = (($description = $this->getDescription()) !== null) ?
  "<p class=\"description label label_description formdescription " . str_replace("label", "description", $classes) . "\">" . htmlspecialchars($description) . "</p>\n" :
  "\n";

$label = $this->getLabel();

$content = "<fieldset class=\"$classes\">\n" . 
  self::tabindent("<legend class=\"legend legend_description $classes\">" . htmlspecialchars($label) . "</legend>\n" .
  "<div class=\"descriptionbox $classes\">" . $description . "</div>" . 
  $inside) . "\n";


