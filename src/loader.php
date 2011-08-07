<?php
$prefix = dirname(__FILE__) . '/';

require_once $prefix . 'form/FormElement.php';
require_once $prefix . 'input/Inputfield.php';

$files = scandir($prefix . 'input');

foreach($files as $file) {
  require_once $prefix . 'input/' . $file;
}

require_once $prefix . 'form/Form.php';
