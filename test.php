#!/usr/bin/php
<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);
require_once 'FormElement.php';
require_once 'Inputfield.php';
require_once 'Hidden.php';
require_once 'Form.php';


$form = new Form();
$form->setLabel("TestForm");
$form->setDescription("Bitte geben sie hier <void> ein ...");
$form->setMethod("post");
$form->setAction($_SERVER['PHP_SELF']);
$form->setEnctype('multipart/form-data');

$field = new Hidden();
$field->setName('w00t!');
$field->setLabel('w00t!');
$field->setDescription('Bitte Namen eingeben?');
$field->setValue('1');

$form->add($field);
echo $form->display();
