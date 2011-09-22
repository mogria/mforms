<?php

include '../src/loader.php';
$form = new Label(new Form("formname", "#", "post", "light"), "Ein Formular & so", "ohne sheis");

$form->add(new Label(new Textbox("text"), "Enter some Text:"));
$form->add(new Label(new Textbox("text2"), "Enter more Text:"));


echo $form->display();
