<?php

  class HtmlTd {
    public $object;
    protected $attributes = array();
    
    public function executeHtml() {
      return '<td>' . $this->object->executeHtml() . '</td>';
    }
    
    public function appendText($value) {
      $this->object = new HtmlPlain($value);
    }
    
    public function setWidth($width) {
      $this->setAttribute('width', $width);
    }
    
    public function setAttributes($attributes) {
      $this->attributes = $attributes;
    }
    
    public function appendAttributes($attributes) {
      if(is_array($attributes)) {
        foreach($attributes as $key => $value) {
          $this->setAttribute($key, $value);
        }
      }
    }
    
    public function setAttribute($key, $value) {
      $this->attributes[$key] = $value;
    }

    public function appendNbsp() {
      $this->object = new HtmlPlain('&nbsp;');
    }

    public function genAttributes() {
      $attributes = '';
      if(is_array($this->attributes)) {
        $attributes = ' ';
        foreach($this->attributes as $key => $value) {
          $attributes .= $key . '="' .$value .'"';
        }
      }
      return $attributes;
    }
    
  }

?>