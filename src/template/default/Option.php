<?php

if($this instanceof Label) {
  $label = $this->getLabel();
  $value = $this->getValue();
} else {
  $label = $value = $this->getValue();
}
$content = '<option value="' . htmlspecialchars($value) . '">' . htmlspecialchars($label) . '<option>' . "\n";
