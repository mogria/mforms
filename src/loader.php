<?php



$prefix = dirname(__FILE__) . '/';

/*
require_once $prefix . 'form/FormElement.php';

$input = $prefix . 'input/';
require_once $input . 'Inputfield.php';
require_once $input . 'InputfieldGroup.php';
require_once $input . 'InputfieldGroupMember.php';
require_once $input . 'Textbox.php';
require_once $input . 'Checkbox.php';
require_once $input . 'Filechooser.php';
require_once $input . 'Hidden.php';
require_once $input . 'Image.php';
require_once $input . 'InputfieldOption.php';
require_once $input . 'Optgroup.php';
require_once $input . 'Option.php';
require_once $input . 'Password.php';
require_once $input . 'Radiogroup.php';
require_once $input . 'Radio.php';
require_once $input . 'Reset.php';
require_once $input . 'Select.php';
require_once $input . 'Submit.php';
require_once $input . 'Textarea.php';
$checker = $prefix . 'checker/';
require_once $checker . 'Checker.php';
require_once $checker . 'NotChecker.php';
require_once $checker . 'AbstractRegularExpressionChecker.php';
require_once $checker . 'CompareChecker.php';
require_once $checker . 'MoreThanChecker.php';
require_once $checker . 'LessThanChecker.php';
require_once $checker . 'EqualChecker.php';
require_once $checker . 'FunctionChecker.php';
require_once $checker . 'InListChecker.php';
require_once $checker . 'LessEqualThanChecker.php';
require_once $checker . 'MailChecker.php';
require_once $checker . 'MoreEqualThanChecker.php';
require_once $checker . 'NotEqualChecker.php';
require_once $checker . 'NotInListChecker.php';
require_once $checker . 'NumericChecker.php';
require_once $checker . 'RegularExpressionChecker.php';
require_once $prefix . 'form/Form.php'; */

class mformsAutoloader {
  public static $classlist = Array();
  public static function init() {
    $indexed_dirs = Array('form', 'input', 'checker');
    foreach($indexed_dirs as $dir) {
      $dir = dirname(__FILE__);
      self::$classlist = array_merge(self::$classlist, self::create_index_of("form"));
    }
  }

  public static function load($classname) {
    if(isset($classlist[$classname])) {
      require_once $classlist[$classname];
    }
  }

  private static function create_index_of($dir) {
    $dir = rtrim($dir, "/");
    $entries = scandir($dir);
    $list = Array();
    foreach($entries as $entry) {
      $entry = $dir . "/" . $entry;
      $ending = 
      if(is_dir($entry)) {
        $list = array_merge($list, create_index_of($dir));
      } else if(is_file($entry) && substr($entry, strrpos($entry, ".") + 1) === "php") {
        $classname = substr($entry, 0, strrpos($entry, "."));
        $list[$classname] = $entry;
      }
    }
    return $list;
  }
}

mformsAutoloader::init();

function __autoload() {
  mformsAutoloader::init();
}
