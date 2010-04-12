<?php

class exContext {
  
  private $routing;
  private $rd;
  private $includePath;
  private $outputType = 'Html';

  public function __construct() {
  
  }
    
  public function setOutputType($outputType = 'Html') {
    $this->outputType = $outputType;
  }
  
  public function getOutputType() {
    return $this->outputType;
  }
  
  public function setRouting(exRouting $ro) {
    $this->ro = $ro;
  }
  
  public function setRequestData(exRequestDataHolder $rd) {
    $this->rd = $rd;
  }
  
  public function getRouting() {
    return $this->ro;
  }
  
  public function getLib($libName, $module = false) {
    exAutoloader::registerLib($libName, $module);
    $lib = new $libName();
    $lib->init($this);
    return $lib;
  }
  
  public function getHtmlHelper($helper) {
    $helperControler = new exHtmlHelper();
    $helperControler->init($this, 'htmlHelper', $helper);
    return $helperControler;      
  }

}


?>