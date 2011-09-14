<?php

$errormessages = "";
foreach($this->getErrorMsgs() as $errmsg) {
  $errormessages .= "<p>" . htmlspecialchars($errmsg) . "</p>\n";
}

$content = $this->object->display() . "\n" . $errormessages;

