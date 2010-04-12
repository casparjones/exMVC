<?php

  class HtmlTh extends HtmlTd {
    protected $attributes = array('bgcolor' => '#8B8BFF');
  
    public function executeHtml() {
      return '<th' . $this->genAttributes() . '>' . $this->object->executeHtml() . '</th>';
    }
  }
  
?>