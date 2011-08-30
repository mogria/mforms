<?php

interface TemplateLoaderInterface {
  public function getPathTo($classname);
  public function setTheme($theme);
  public function getTheme();
  public function __construct();
}
