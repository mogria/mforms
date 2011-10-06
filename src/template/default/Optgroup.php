<?php

$content = "<optgroup>\n";
foreach($this as $member) {
  $content .= $member->display() . "\n";
}
$content = "</optgroup>\n";
