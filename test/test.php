#!/usr/bin/php
<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);
require_once '../src/FormElement.php';
require_once '../src/Inputfield.php';
require_once '../src/Submit.php';
require_once '../src/Textbox.php';
require_once '../src/Hidden.php';
require_once '../src/Password.php';
require_once '../src/Form.php';


$form = new Form();
$form->setLabel("TestForm");
$form->setDescription("Bitte geben sie hier <void> ein ...");
$form->setMethod("get");
$form->setAction("#");
$form->setEnctype('multipart/form-data');

$field = new Hidden();
$field->setName('w00t!');
$field->setLabel('w00t!');
$field->setDescription('Bitte Namen eingeben?');
$field->setValue('1');
$form->add($field);

$field = new Textbox();
$field->setName('name');
$field->setLabel('name');
$field->setValue('Wayne');
$form->add($field);

$field = new Password();
$field->setName('pw');
$field->setLabel('password');
$field->setValue('123');
$form->add($field);



$field = new Submit();
$field->setName('submid!');
$field->setLabel('sub, sub');
$field->setValue('PressS!!!!!');
$form->add($field);

echo $form->display();
