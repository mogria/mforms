<?php

$errormessages = "";
$classes = "errormsg errmsg_" . $this->getName() . " " . $this->getName() . " errmsg_" . $this->getType() . " " . $this->getType();
$classes = htmlspecialchars($classes);
foreach($this->getErrorMsgs() as $errmsg) {
  $errormessages .= "<p class=\"errmsgp $classes\">" . htmlspecialchars($errmsg) . "</p>\n";
}

$content = "<div class=\"errmsgcontainer\">" . $this->object->display() . "</div>\n<div class=\"errmsgdiv $classes\">" . $errormessages . "</div>";

