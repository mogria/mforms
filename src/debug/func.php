<?php

function readableBacktrace() {
  $backtrace = debug_backtrace();
  array_shift($backtrace);
  $backtrace = array_values($backtrace);
  echo "\n\n\nBACKTRACE: \n\n";
  $anz = count($backtrace);
  foreach($backtrace as $key => $b) {
    echo ($anz - $key) . ". " .  (isset($b['class']) ? $b['class']  . "::" : "") . $b['function'] . "() in " . $b['file'] . ":" . $b['line'] . "\n";
  }
  echo "\n";
}
