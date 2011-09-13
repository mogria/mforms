<?php


$content = $this->object->display() . "\n" . '<p class="errormsg">' . implode('</p><p class="errormsg">', $this->getErrorMsgs()) . "</p>\n";

