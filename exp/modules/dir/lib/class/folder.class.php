<?php
require_once('file.class.php');

class Folder extends ArrayIterator {

  private $folder;
  private $ignoreFiles;
  private $filter;

  public function __construct($folder = false) {
    $this->setIgnoreFiles();
    $this->setFilter();
    if($folder) $this->loadFolder($folder);  
  }

  public function setIgnoreFiles($files = array()) {
    $this->ignoreFiles = (is_array($ignoreFiles)) ? $ignoreFiles : array();
  }

  public function setFilter($files = array()) {
    $this->filter = (is_array($files)) ? $files : array();
  }
  
  public function loadFolder($folder) {
    $this->folder      = $folder;
    $folderData = glob($this->folder . '/*');
    foreach($folderData as $fileName) {
      $file = new File($fileName);
      if(!$this->isFileIgnored($file) && $this->isFiledFilterd($file)) {
        $this->append($file);
      }
    }
  }
  
  private function isFiledFilterd(File $file) {
    if(count($this->filter) == 0) return true;
    foreach($this->filter as $filterFile) {
      $filterRexEx = '|' . $filterFile . '|';
      if(preg_match($filterRexEx , $file->getFile())) {
        return true;
      }    
    }
    return false;
  }

  private function isFileIgnored(File $file) {
    if(count($this->ignoreFiles) == 0) return false;
    foreach($this->ignoreFiles as $ignoreFile) {
      $ignoreRexEx = '|' . $ignoreFile . '|';
      if(preg_match($ignoreRexEx, $file->getFile())) {
        return true;
      }    
    }
    return false;
  }
 
  public function getFiles() {
  
  }
  

}

?>