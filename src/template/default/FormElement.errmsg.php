<?php

$errormessages = "";
foreach($this->getErrorMsgs() as $errmsg) {
  $errormessages .= "<p class=\"errormsg\">" . htmlspecialchars($errmsg) . "</p>\n";
}

$content = $errormessages;

