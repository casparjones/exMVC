<?php

class exHtmlHelper extends exFrontendControler {
  
  public function init(exContext $context, $module = false, $action = false) {
    parent::init($context, $module, $action);
    // $this->setOutputType('Html');    
  }

}

?>