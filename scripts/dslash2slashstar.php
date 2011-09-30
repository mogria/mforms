#!/usr/bin/php
<?php

function go($dir) {
  $dir = rtrim($dir, "/");
  //echo "dir: $dir\n";
  $entries = scandir($dir);
  foreach($entries as $entry) {
    if(strpos($entry, ".") === 0) {
      continue;
    }

    $f = $dir . "/" . $entry;
    if(is_file($f) && substr($f, strrpos($f, ".") + 1) == "php") {
      echo "file: $f   ";
      $content = file_get_contents($f);
      $ncontent = preg_replace("#/\*\s*(@todo[^\*]*)\*/\n#i", "/** \\1 */\n", $content);
      if($ncontent == $content) {
        echo "same";
      }
      file_put_contents($f, $ncontent);
        echo "\n";
    } elseif(is_dir($f)) {
      go($f);
    }
  }
}


if(isset($argv[1])) {
  $startdir = $argv[1];
  go($startdir);
} else {
  echo "USAGE: {$argv[0]} startdir\n";
}
