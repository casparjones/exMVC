<?php

class File {
  
  private $file;
  private $baseName;
  private $basePath;
  private $baseUrl;
  private $metaData;
  
  const TYPE_FOLDER = 'dir';
  const TYPE_FILE   = 'file';
  
  public function __construct($file) {
    $this->loadFile($file);
  }
  
  public function loadFile($file) {
    $this->file     = $file;
    $this->baseName = basename($this->file);
    $this->basePath = dirname($this->file);
    $this->baseUrl  = $this->genBaseUrl();
    $this->url      = $this->getUrl();
    $fileData = pathinfo($this->file);
    
    $this->setMeta('ext', strtolower($fileData['extension']));
    $this->setMeta('rawExt', $fileData['extension']);
    $this->setMeta('type', filetype($this->file));
    $this->setMeta('mime', mime_content_type($this->file));
    $this->setMeta('name', basename($this->file, '.' . $this->getMeta('rawExt')));
    $this->setMeta('filesize', filesize($this->file));
  }
  
  public function getFile() {
    return $this->file;
  }
  
  private function setMeta($key, $value) {
    $this->meta[$key] = $value;
  }
  
  public function getMeta($key, $default = '') {
    if(isset($this->meta[$key])) return $this->meta[$key];
    return $default;
  }
  
  public function getUrl() {
    return $this->baseUrl . '/' . $this->baseName;
  }
  
  public function getName() {
    return $this->getMeta('name', 'n/a');
  }
  
  public function getFileName() {
    return $this->baseName;
  }
  
  public function getSize() {
    $size = $this->meta['filesize'];
    return $size;
  }
  
  private function genBaseUrl() {
    $filePath = dirname($this->file);
    $basePath = file_base_path;
    $basePathCount = strlen($basePath);
    $filePathCount = strlen($filePath);
    $dif           = $basePathCount - $filePathCount;
    
    // cut the basepath from filepath to get the directory  1
    if($dif < 0) {
      $dir = substr($filePath, $dif);
    } else {
      $dir = '';
    } 
    
    return file_base_url . $dir;  
  }

}
  
?>