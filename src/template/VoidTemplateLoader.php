<?php

class VoidTemplateLoader implements TemplateLoaderInterface {
  public function getPathTo($classname) {
    return null;
  }

  public function setTheme($theme) { }

  public function getTheme() {
    return null;
  }

  public function __construct() { }
}
