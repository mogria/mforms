<?php
$classes = "input input_" . $this->getName() . " " . $this->getName() . " input_" . $this->getType() . " " . $this->getType();
$classes = htmlspecialchars($classes);


$description = (($description = $this->getDescription()) !== null) ?
  "\t<p class=\"description input_description $classes\">" . htmlspecialchars($description) . "</p>\n" :
  "\n";

$content = "<label class=\"$classes\">\n" . 
self::tabindent("<span>" . htmlspecialchars($this->getLabel()) . "</span>\n" . 
$description . 
$this->object->display()) . 
"</label>\n";

