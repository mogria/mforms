<?php


class TemplateLoader implements TemplateLoaderInterface {
  /** Note
   * the path to the single template file is $template_dir + $theme + $classname
   */

  protected $template_dir;

  protected $theme;

  protected $theme_index = Array();

  protected $template_index = Array();

  protected $default_theme_loader;

  protected $template_extension;

  /**
   * Getter for template_dir
   *
   * @return (string) : Directory containing all the themes
   */
  public function getTemplateDir() {
    return $this->template_dir;
  }

  /**
   * Setter for template_dir
   *
   * @param (string) $template_dir: Directory containing all the themes
   */
  public function setTemplateDir($dir) {
    $this->template_dir = realpath(rtrim($dir, "/"));
    $this->indexThemes();
    $this->indexTemplates();
  }

  /**
   * Getter for theme
   *
   * @return (string) : The template theme
   */
  public function getTheme() {
    return $this->theme;
  }

  /**
   * Setter for theme
   *
   * @param (string) $theme : The template theme
   */
  public function setTheme($value) {
    if(!in_array((string)$value, array_keys($this->theme_index), true)) {
      throw new InvalidArgumentException("invalid theme");
    }

    $this->theme = $value;

    if($this->theme !== "default") {
      $this->default_theme_loader = new TemplateLoader();
    } else {
      $this->default_theme_loader = new VoidTemplateLoader();
    }
    $this->indexTemplates();
  }

  /**
   * Get the directory of the current theme
   *
   * @return (string) : directory of the current theme
   */
  public function getThemeDir() {
    return (isset($this->theme_index[$this->theme]) ? $this->theme_index[$this->theme] : ".");
  }

  /**
   * Create an index of all the themes
   */
  public function indexThemes() {
    $path = $this->getTemplateDir();
    $files = scandir($path);
    $files = array_diff($files, array(".", ".."));
    foreach($files as $file) {
      $fpath = $path . "/" . $file;
      if(is_dir($fpath)) {
        $this->theme_index[$file] = $fpath;
      }
    }
  }

  /**
   * Create an index of all the themes in a Template
   */
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

  /**
   * Get a path to a Template of an Class
   */
  public function getPathTo($classname) {
    $classname = $classname . $this->getTemplateExtension();
    if(isset($this->template_index[$classname])) {
      return $this->template_index[$classname];
    } else {
      return $this->default_theme_loader->getPathTo($classname);
    }
  }

  /**
   * Getter for the extension to the Template
   * 
   * @return (string) : the extension
   */
  public function getTemplateExtension() {
    return $this->template_extension;
  }

  /**
   * Setter for the extension to the Template
   * 
   * @param (string) $extension : the extension - example: ".label"
   */
  public function setTemplateExtension($extension) {
    $this->template_extension = $extension;
  }

  /** Constructor
   * Set's the theme and the Template Directory
   *
   * @param (string) $theme : the Theme
   * @param (string) $template_dir : the directory with the themes in it. default directory of which contains this file
   * @param (string) $extension: the extension of the template files
   */
  public function __construct($theme = "default", $template_dir = null, $extension = ".php") {
    //Set template directory
    $this->setTemplateDir(($template_dir === null) ? dirname(__FILE__) : $template_dir);

    //Set theme
    $this->setTheme($theme);
  }
}
