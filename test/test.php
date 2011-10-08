<?php
//Show all errors
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);

require_once '../src/loader.php';

//Create the form
$form = new Form('form1', "#", "post", "default");

//Set some properties
$form = new Label($form, "void", "ohne scheiss");

//Create a Hidden Control
$field = new Hidden('woot');

//Set some properties
$field = new Label($field, "hidden !", "description");
$field->setValue('1');
//Add Control to Form
$form->add($field);

//Create a Textbox Control
$field = new Label(new ErrorMessage(new Textbox('name'), "FEHLER!"), "Benutzername");

//Set some properties
$field->setClass("tbox");
$field->setSize(40);
$field->setMaxlength(10);
$field->setValue("void");

//Add Control to Form
$form->add($field);

//Create a Password Control
$field = new Label(new Password('pw', false, "/.{6,}/"), "Password");

//Set some properties
$field->setValue('123456');
$field->setId('pwd');
//Add Control to Form
echo "field {$field->getName()} is " . ($field->isValid() ? "" : "not ") . "valid";
$form->add($field);

//Create a Textarea Control
$field = new Label(new Textarea('tname'), "Message");

//Set some properties
$field->setValue('this is the <>& VALUE!');
$field->setClass("tarea");
$field->setRows(5);
$field->setCols(80);

//Add Control to Form
$form->add($field);


//Create a Submit Button Control
$field = new Label(new Submit('submid'), "Absenden");

//Set some properties
$field->setValue('PressS!!!!!');
//Add Control to Form
$form->add($field); 

//Create a Reset Button Control
$field = new Label(new Reset('reset'), "Zur&uuml;ck setzen");

//Set some properties
$field->setValue('Clear');
//Add Control to Form
$form->add($field); 

//Create a Image Control
$field = new Label(new Image('da image'), "Bild hochladen");

//Set some properties
$field->setValue('value');
$field->setSrc("source_which_doesnt_exist");
$field->setAlt("mööööp!");
//Add Control to Form
$form->add($field); 

//Create a Filechooser Control
$field = new Label(new Filechooser('fl'), "select a file from your harddrive");

//Set some properties
//Add Control to Form
$form->add($field); 


//Create a Radiogroup
$field = new Radiogroup('test');
$option = new Radio('v1', 'label1');
$field->add($option);
$option = new Radio('v2', 'label2');
$field->add($option);
//Add Control to Form
$form->add($field); 

$field = new Label(new Select('SELECTA!!!'), "essen");
$field->add(new Option('1', 'Pizza'));
$field->add(new Option('2', 'Pommes'));
$opt = new Option('3', 'Frittes');
$opt->setSelected(true);
$field->add($opt);
$form->add($field);

$form->catchRequestData();
$form->addChecker(new EqualChecker($form->get('name'), "void"));
//Display the Form
echo $form->display();

echo "field {$form->getName()} is " . ($form->isValid() ? "" : "not ") . "valid";
