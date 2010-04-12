<?php

class exConfig extends exDataHolder {

  private $instance;
 
  private function __construct() {
    // do nothing, but declare as private      
  } 
  
  public function getInstance() {
    if(!isset($this->instance) {
      $this->instance = new self();
    }
    return $this->instance;
  } 
                                           
}

?>