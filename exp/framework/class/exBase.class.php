<?php

class exBase extends exAttributeHolder {

  private $context;
  
  public function init(exContext $context) {
    $this->context = $context;
  }  
  
  public function getContext() {
    return $this->context;
  }

}

?>