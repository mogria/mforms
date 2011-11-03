<?php

//Show all errors
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);

require_once '../src/loader.php';

$form = new Form('formular', "#", "post", "default");
$input = new Textbox('name');
//$input->setValue(Array('name' => 'void.php', 'tmp_name' => 
$form->addChecker($checker = new MIMETypeChecker(array($input), Array('text/plain', 'text/html')));

$file = "/etc/passwd";
$file = realpath($file);
var_dump($checker->checkValue(array('tmp_name' => $file, 'name' => $file, 'size' => filesize($file))));

