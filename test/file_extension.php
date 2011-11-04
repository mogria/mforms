
<?php

//Show all errors
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);

require_once '../src/loader.php';

$form = new Form('formular', "#", "post", "default");
$input = new Textbox('name');
$form->addChecker($checker = new FileExtensionChecker(array($input), Array('txt', 'php')));

$file = __FILE__;
$file = realpath($file);
$value = array('tmp_name' => $file, 'name' => $file, 'size' => filesize($file));
$input->setValue($value);
var_dump($checker->checkValue($value));

