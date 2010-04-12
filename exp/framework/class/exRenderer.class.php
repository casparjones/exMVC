<?php

require_once(exAPPLIB . '/Dwoo/dwooAutoload.php');
class exRenderer extends exBase {

  public $renderer;
  
  public function init($context) {
    parent::init($context);
    $this->renderer = new Dwoo();
  }
  
  public function getRenderer() {
    return $this->renderer;
  }


}

?>