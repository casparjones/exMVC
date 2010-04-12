<?php
define('mod_browser_path', dirname(__FILE__));
require_once(mod_browser_path . '/class/folder.class.php');

class Browser extends exBase {
  var $basePath;
  var $baseUrl;
  var $appendPath;
  var $folder;
  var $ignoreFiles;
  var $filter;

  public function __construct() {
    $this->baseUrl = exURL;
    $this->basePath = exDIR;
    
    // file configs
    define('file_base_path', $this->basePath);
    define('file_base_url', $this->baseUrl);
  }

  public function reloadDir($path) {
    $this->appendPath = $path;
    $this->loadFiles();
	}
	
  public function loadFiles() {
	$realPath = realpath($this->baseDir . '/' . $this->appendPath);
	$this->folder = new Folder();
	$this->folder->setIgnoreFiles($this->ignoreFiles);
	$this->folder->setFilter($this->filter);
	$this->folder->loadFolder($realPath);
 }
 
 public function setIgnoreFiles($ignoreFiles) {
  $this->ignoreFiles = $ignoreFiles;
 }

 public function setFilter($filter) {
  $this->filter = $filter;
 }
 
 public function getFolder() {
  return $this->folder;
 }

}


?>
