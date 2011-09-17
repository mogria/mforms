<?php
$content = "<select " . self::getAttributeNodes($this->attributes) . ">\n";
foreach($this as $key => $input) {
  $content .= $input->display();
}
$content .= "</select>\n";
