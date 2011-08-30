<?php

class TemplateLoader implements TemplateLoaderInterface {
  const DEFAULT_TEMPLATE_DIR = "template";

  protected $template_dir;

  public function getTemplateDir() {
    return $this->template_dir;
  }

  public function setTemplateDir($dir) {
    $this->template_dir = $dir;
  }

  protected $theme;

  protected $theme_index = Array();

  protected $default_theme_loader;

  public function getTheme() {
    return $this->theme;
  }

  public function setTheme($value) {
    $this->theme = $value;
  }

  public function getThemeDir() {
    return $this->theme_index[$this->theme];
  }

  public function indexThemes() {
    $path = $this->getTemplateDir();
    $files = scandir($path);
    foreach($files as $file) {
      $fpath = $path . "/" . $file;
      if(is_dir($fpath)) {
        $this->theme_index[$file] = $fpath;
      }
    }
  }

  public function getPathTo($classname) {
    if(isset($this->theme_index[$classname])) {
      return $this->theme_index[$classname];
    } else {
      return $this->default_theme_loader->getPathTo($classname);
    }
  }

  public function __construct($theme = "default", $template_dir = null) {
    $this->setTemplateDir(($template_dir === null) ? dirname(__FILE__) . "/" . self::DEFAULT_TEMPLATE_DIR : "template");
    $this->indexThemes();
    $this->default_theme_loader = new TemplateLoader();
    $this->default_theme_loader->setTheme("default");
    $this->setTheme($theme);
  }
}
