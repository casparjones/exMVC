<?php

class exFrontendControler extends exBase {

  private $module;
  private $action;
  private $actionName;
  private $viewName;
  private $view;
  
  public function init(exContext $context, $module = false, $action = false) {
    parent::init($context);    
  
    $this->module     = $module;
    $this->actionName = ucfirst($action); 
    $className = 'exAction';

    exAutoloader::registerMod($this->module, $this->actionName);
    $newClassName = $this->module . '_' . $this->actionName . 'Action';
    $this->action = new $newClassName;
    
    $this->action->init($this->getContext());
  }
  
  public function execute(exDataHolder $rd = NULL) {
    $renderer = new exRenderer();
    
    $this->viewName = ucfirst($this->action->execute($rd));
    $className = 'ex' . $this->viewName . 'View';
    
    exAutoloader::registerMod($this->module, $this->actionName, $this->viewName);
    $newClassName = $this->module . '_' . $this->actionName . $this->viewName .  'View';
    $this->view = new $newClassName();
    $this->view->init($this->getContext());
    
    $this->view->setAttributes($this->action->getAttributes());
    $this->view->setRenderer($renderer);
    
    $outputType = $this->getContext()->getOutputType();
    $methodName = 'execute' . ucfirst($outputType);
    $res = $this->view->$methodName($rd);
    if($res === NULL && $this->view->hasRenderer()) {
      $args = $this->view->getAttributes();
      if($args === NULL) $args = array();
      $res = $this->view->getRenderer()->get($this->view->getTemplate(), $args);
    }
    echo $res;
  }

}


?>