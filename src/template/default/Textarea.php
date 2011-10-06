<?php

$content = "<textarea" . self::getAttributeNodes($this->attributes) . ">"
 . htmlspecialchars($this->getValue())
 . "</textarea>\n";

