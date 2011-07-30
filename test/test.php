#!/usr/bin/php
<?php
//Show all errors
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);

$fpath = dirname(__FILE__) . "/";

//Change to the classes directory
chdir($fpath . "../src");

//Include needed Form Controls
require_once 'FormElement.php';
require_once 'Inputfield.php';
require_once 'Submit.php';
require_once 'Textbox.php';
require_once 'Hidden.php';
require_once 'Password.php';
require_once 'Form.php';


//Change Directory back
chdir($fpath);

//Create the form
$form = new Form();

//Set some properties
$form->setLabel("TestForm");
$form->setDescription("Bitte geben sie hier <void> ein ...");
$form->setMethod("get");
$form->setAction("#");
$form->setEnctype('multipart/form-data');

//Create a Hidden Control
$field = new Hidden();

//Set some properties
$field->setName('w00t!');
$field->setLabel('w00t!');
$field->setDescription('Bitte Namen eingeben?');
$field->setValue('1');
//Add Control to Form
$form->add($field);

//Creata a Textbox Control
$field = new Textbox();

//Set some properties
$field->setName('name');
$field->setLabel('name');
$field->setValue('Wayne');
//Add Control to Form
$form->add($field);

//Creata a Password Control
$field = new Password();

//Set some properties
$field->setName('pw');
$field->setLabel('password');
$field->setValue('123');
//Add Control to Form
$form->add($field);

//Creata a Password Control
$field = new Submit();

//Set some properties
$field->setName('submid!');
$field->setLabel('sub, sub');
$field->setValue('PressS!!!!!');
//Add Control to Form
$form->add($field); 

//Display the Form
echo $form->display();
