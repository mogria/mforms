<?php

$content = "";
foreach($this as $member) {
  $content = $member->display() . "\n";
}

