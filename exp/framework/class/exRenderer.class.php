<?php

class exRenderer extends exBase {

  public $renderer;
  
  public function init($context) {
    parent::init($context);
    $this->renderer = new Dwoo\Core();
  }
  
  public function getRenderer() {
    return $this->renderer;
  }


}

?>