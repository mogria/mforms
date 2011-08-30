<?php

interface TemplateLoaderInterface {
  public function getPathTo();
  public function setTheme();
  public function getTheme();
  public function __construct();
}
