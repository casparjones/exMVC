<?php

class exRequestDataHolder extends exDataHolder {

  public function __construct() {
    foreach($_REQUEST as $key => $value) {
      $this->setParameter($key, $value);
    }
  } 
                                          
}

?>