<?php
$prefix = dirname(__FILE__) . '/';

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
require_once $checker . 'EqualChecker.php';
require_once $checker . 'InListChecker.php';
require_once $prefix . 'form/Form.php';
