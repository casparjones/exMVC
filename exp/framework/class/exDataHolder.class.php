<?php

class exDataHolder {

  protected $data;

  public function setParameter($key, $value) {
    $this->data[$key] = $value;
  }
  
  public function getParameter($key, $default = NULL) {
    if(isset($this->data[$key])) {
      return $this->data[$key];
    } else {
      return $default;
    }  
  }

  public function getParameters() {
    return $this->data;
  }
  
  public function unsetParameter($key) {
    if(isset($this->data[$key])) unset($this->data[$key]);
  }

}

?>