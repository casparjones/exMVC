<?php

  class HtmlTr extends ArrayIterator {
    
    public $listener;
    
    public function executeHtml() {
      return '<tr>' . $this->executeObjectsHtml() . '</tr>';
    }
    
    protected function executeObjectsHtml() {
      $html = '';
      foreach($this as $obj) {
        $html .= $obj->executeHtml();
      }
      
      return $html;
    }
    
    public function addListener($listener) {
      $this->listener[$listener->getId()] = $listener;    
    }
    
    public function createHeaderField($attributes = false) {
      $th = new HtmlTh();
      if($attributes) $th->appendAttributes($attributes); 
      $this->append($th);
      $this->updateListener();    
      return $th;
    }
    
    public function createField($attributes = false) {
      $td = new HtmlTd();
      if($attributes) $th->appendAttributes($attributes); 
      $this->append($td);
      $this->updateListener();    
      return $td;
    }
    
    public function updateListener() {
      foreach($this->listener as $listener) {
        $listener->updateTrCounter($this->count());
      }
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