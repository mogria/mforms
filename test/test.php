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
require_once 'Reset.php';
require_once 'Image.php';
require_once 'Textbox.php';
require_once 'Textarea.php';
require_once 'Hidden.php';
require_once 'Password.php';
require_once 'Form.php';


//Change Directory back
chdir($fpath);

//Create the form
$form = new Form('form1');

//Set some properties
$form->setLabel("TestForm");
$form->setDescription("Bitte geben sie hier <void> ein ...");
$form->setMethod("get");
$form->setClass("a_form");
$form->setAction("#");

//Create a Hidden Control
$field = new Hidden('woot');

//Set some properties
$field->setLabel('w00t!');
$field->setDescription('Bitte Namen eingeben?');
$field->setValue('1');
//Add Control to Form
$form->add($field);

//Create a Textbox Control
$field = new Textbox('name');

//Set some properties
$field->setLabel('name');
$field->setValue('WayneWithAVeryLongName');
$field->setClass("tbox");
$field->setSize(40);
$field->setMaxlength(10);

//Add Control to Form
$form->add($field);

//Create a Password Control
$field = new Password('pw', false, "/.{6,}/");

//Set some properties
$field->setLabel('password');
$field->setValue('123456');
$field->setId('pwd');
//Add Control to Form
echo "field {$field->getName()} is " . ($field->isValid() ? "" : "not ") . "valid";
$form->add($field);

//Create a Textarea Control
$field = new Textarea('name');

//Set some properties
$field->setLabel('area');
$field->setValue('this is the <>& VALUE!');
$field->setClass("tarea");
$field->setRows(5);
$field->setCols(80);

//Add Control to Form
$form->add($field);


//Creata a Submit Button Control
$field = new Submit('submid');

//Set some properties
$field->setLabel('sub, sub');
$field->setValue('PressS!!!!!');
//Add Control to Form
$form->add($field); 

//Creata a Reset Button Control
$field = new Reset('reset');

//Set some properties
$field->setLabel('remove data');
$field->setValue('Clear');
//Add Control to Form
$form->add($field); 

//Creata a Reset Button Control
$field = new Image('da image');

//Set some properties
$field->setLabel('Bildknopf');
$field->setValue('value');
$field->setSrc("source_which_doesnt_exist");
$field->setAlt("mööööp!");
//Add Control to Form
$form->add($field); 


//Display the Form
echo $form->display();

echo "field {$form->getName()} is " . ($form->isValid() ? "" : "not ") . "valid";
