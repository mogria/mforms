<?php

class mformsAutoloader {
  public static $classlist = Array();
  public static function init() {
    $indexed_dirs = Array('form', 'input', 'checker');
    foreach($indexed_dirs as $dir) {
      $dir = dirname(__FILE__) . "/" . $dir;
      self::$classlist = array_merge(self::$classlist, self::create_index_of($dir));
    }
  }

  public static function load($classname) {
    //print_r(self::$classlist);
    if(isset(self::$classlist[$classname])) {
      require_once self::$classlist[$classname];
    }
  }

  private static function create_index_of($dir) {
    $dir = rtrim($dir, "/");
    $entries = scandir($dir);
    $entries = array_slice($entries, 2);
    $list = Array();
    foreach($entries as $entry) {
      $entry = $dir . "/" . $entry;
      if(is_dir($entry)) {
        $list = array_merge($list, self::create_index_of($entry));
      } else if(is_file($entry) && substr($entry, strrpos($entry, ".") + 1) === "php") {
        $classname = substr($entry, 0, strrpos($entry, "."));
        $classname = substr($classname, strrpos($classname, "/") + 1);
        $list[$classname] = $entry;
      }
    }
    return $list;
  }
}

mformsAutoloader::init();

FormElement::setTemplateLoader(new TemplateLoader("default"));

spl_autoload_register(Array('mformsAutoloader', 'load'));
