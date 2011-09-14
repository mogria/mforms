<?php

$description = (($description = $this->getDescription()) !== null) ?
  "\t<p class=\"description\">" . htmlspecialchars($description) . "</p>\n" :
  "\n";

$content = "<label class=\"input " . htmlspecialchars($this->getType()) . "\">\n" . 
self::tabindent("<span>" . htmlspecialchars($this->getLabel()) . "</span>\n" . 
$description . 
$this->object->display()) . 
"</label>\n";

