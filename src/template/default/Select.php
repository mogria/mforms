<?php
$content = "<select " . self::getAttributeNodes($this->attributes) . ">\n";

$inner = "";
foreach($this as $key => $input) {
  $inner .= $input->display();
}
$content .= self::tabindent($inner);
$content .= "</select>\n";
