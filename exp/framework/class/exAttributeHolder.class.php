<?php

class exAttributeHolder {

  private $data;

  public function setAttribute($key, $value) {
    $this->data[$key] = $value;
  }
  
  public function getAttribute($key, $default = NULL) {
    if(isset($this->data[$key])) {
      return $this->data[$key];
    } else {
      return $default;
    }  
  }
  
  public function setAttributes($data) {
    $this->data = $data;
  }
  
  public function getAttributes() {
    return $this->data;
  }

}

?>