<?php

$description = (($description = $this->getDescription()) !== null) ?
  "\t<p>" . htmlspecialchars($description) . "</p>\n" :
  "\n";

$content = "<label>\n" . 
self::tabindent("<span>" . htmlspecialchars($this->getLabel()) . "</span>\n" . 
$description . 
$this->object->display()) . 
"</label>\n";

