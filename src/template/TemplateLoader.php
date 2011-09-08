<?php

class TemplateLoader implements TemplateLoaderInterface {

  protected $template_dir;

  public function getTemplateDir() {
    return $this->template_dir;
  }

  public function setTemplateDir($dir) {
    $this->template_dir = realpath(rtrim($dir, "/"));
  }

  protected $theme;

  protected $theme_index = Array();

  protected $template_index = Array();

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

  public function indexTemplates() {
    $path = $this->getThemeDir();
    $files = scandir($path);
    foreach($files as $file) {
      $fpath = $path . "/" . $file;
      if(is_file($fpath)) {
        $this->template_index[substr($file, 0, strrpos($file, "."))] = $fpath;
      }
    }
  }

  public function getPathTo($classname) {
    if(isset($this->template_index[$classname])) {
      return $this->template_index[$classname];
    } else {
      return $this->default_theme_loader->getPathTo($classname);
    }
  }

  public function __construct($theme = "default", $template_dir = null) {
    $this->setTemplateDir(($template_dir === null) ? dirname(__FILE__) : $template_dir);
    $this->indexThemes();
    if($theme !== "default") {
      $this->default_theme_loader = new TemplateLoader();
      $this->default_theme_loader->setTheme("default");
    } else {
      $this->default_theme_loader = new VoidTemplateLoader();
    }
    $this->setTheme($theme);
    $this->indexTemplates();
  }
}
