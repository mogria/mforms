<?php
//Show all errors
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', 1);

require_once '../src/loader.php';

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
$field->setMaxlength(40);

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


//Create a Submit Button Control
$field = new Submit('submid');

//Set some properties
$field->setLabel('sub, sub');
$field->setValue('PressS!!!!!');
//Add Control to Form
$form->add($field); 

//Create a Reset Button Control
$field = new Reset('reset');

//Set some properties
$field->setLabel('remove data');
$field->setValue('Clear');
//Add Control to Form
$form->add($field); 

//Create a Reset Button Control
$field = new Image('da image');

//Set some properties
$field->setLabel('Bildknopf');
$field->setValue('value');
$field->setSrc("source_which_doesnt_exist");
$field->setAlt("mööööp!");
//Add Control to Form
$form->add($field); 

//Create a Filechooser Control
$field = new Filechooser('fl');

//Set some properties
$field->setLabel('select File');
//Add Control to Form
$form->add($field); 


//Create a 
$field = new Radiogroup('test');
$option = new Radio('v1', 'label1');
$field->add($option);
$option = new Radio('v2', 'label2');
$field->add($option);
//Add Control to Form
$form->add($field); 

$field = new Select('SELECTA!!!');
$field->setLabel('void');
$field->add(new Option('1', 'Pizza'));
$field->add(new Option('2', 'Pommes'));
$opt = new Option('3', 'Frittes');
$opt->setSelected(true);
$field->add($opt);
$form->add($field);

$form->catchRequestData();
$form->addChecker(new EqualChecker(array('pw', 'name')));
$form->addChecker(new InListChecker('name', array('voidvoid', 'rayray')));
//Display the Form
echo $form->display();

echo "field {$form->getName()} is " . ($form->isValid() ? "" : "not ") . "valid";
