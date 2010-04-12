<?php

class HtmlPlain {
  private $valueStr;
  
  public function __construct($value) {
    $this->setValue($value);
  }
  
  public function setValue($value) {
    $this->valueStr = $value;
  }
  
  public function executeHtml() {
    return $this->valueStr;
  }
}

?>