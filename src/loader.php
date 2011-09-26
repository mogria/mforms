<?php

require_once dirname(__FILE__) . '/debug/func.php';

class mformsAutoloader {

  private static $initialized = false;

  private static $classlist = Array();

  /**
   * Initializer
   * creates class index 
   */
  public static function init() {
    //set Flag
    self::$initialized = true;

  //All the directories with will be indexed relative to the directory containing this file
  $indexed_dirs = Array('form', 'input', 'checker', 'template', 'decorators');

    //The max depth of the directory
    // -1 -> infinite
    $depth = Array(-1, -1, -1, 1, -1);

    //go through each directory
    foreach($indexed_dirs as $key => $dir) {
      //get path to directory
      $dir = dirname(__FILE__) . "/" . $dir;

      //append the indexed classes to the classlist
      self::$classlist = array_merge(self::$classlist, self::create_index_of($dir, $depth[$key]));
    }
  }

  /**
   * Autoloader function
   *
   * @param (string) $classname : the class which should be included
   */
  public static function load($classname) {
    //initialize if not already initualized
    if(!self::$initialized) {
      self::init();
    }

    if(isset(self::$classlist[$classname])) {
      //include the file containing the class
      require_once self::$classlist[$classname];
      
      //remove the class from the file
      unset(self::$classlist[$classname]);
    }
  }

  /**
   * Creates an Class index of an directory
   *
   * @param (string) $dir : name of the directory which will be indexed
   * @param (int) $depth  : how depth the directory should be indexed
   * @return (Array)      : the class index - key -> classname => value -> path
   */
  private static function create_index_of($dir, $depth = -1) {
    $list = Array();
    //reached depth limit?
    if($depth != 0) {
      
      //remove slash at the end of the path
      $dir = rtrim($dir, "/");

      //scan the directory
      $entries = scandir($dir);

      //remove first two entries ("." and "..")
      $entries = array_slice($entries, 2);

      //go through each entry
      foreach($entries as $entry) {

        //build path
        $entry = $dir . "/" . $entry;

        //is a dir?
      if(is_dir($entry)) {
          //do a recursive call and index the subdirectory
          //and finally add all the entries to the list
          $list = array_merge($list, self::create_index_of($entry, $depth - 1));
        // is a file and has extension ".php"?
        } else if(is_file($entry) && substr($entry, strrpos($entry, ".") + 1) === "php") {
          //cut out classname
          $classname = substr($entry, 0, strrpos($entry, "."));
          $classname = substr($classname, strrpos($classname, "/") + 1);

          //add class to list
          $list[$classname] = $entry;
        }
      }
    }
    return $list;
  }

  /**
   * Include all the classes in the index
   */
  public static function load_all() {
    foreach(self::$classlist as $classfile) {
      echo "including $classfile\n";
      require_once $classfile;
    }
  }
}

mformsAutoloader::init();

spl_autoload_register(Array('mformsAutoloader', 'load'));

//mformsAutoloader::load_all();
