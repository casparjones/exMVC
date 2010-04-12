<?php

class exHtmlHelper extends exFrontendControler {
  
  public function init(exContext $context, $module, $action) {
    parent::init($context, $module, $action);
    $this->setOutputType('Html');    
  }

}

?>