<?php

class exBaseView extends exBase {
    private $renderer = NULL;
    private $tempate;
    public $ro;
    
    public function init(exContext $context) {
      parent::init($context);
      $this->ro = $this->getContext()->getRouting();
    }
    
    public function hasRenderer() {
      return $this->renderer instanceof exRenderer;
    }
    
    public function setRenderer(exRenderer $renderer) {
      $this->renderer = $renderer;
      $this->renderer->init($this->getContext());
    }
    
    public function render() {
      if($this->renderer instanceof exRenderer) {
        $renderer = $this->renderer->get($template);
        return $html;      
      } else {
        throw new exException('Renderer Not found');
      }
    }
    
    public function getRenderer() {
      return $this->renderer->getRenderer();
    }
    
    public function getModPubUrl() {
      return exPUB . '/modules/' . $this->ro->getModule();
    }
    
    public function getModDir() {
      return exMOD . '/' . $this->ro->getModule() . '/impl/' . $this->ro->getAction() . '/';
    }
    
    public function getTemplate($template = 'exTemplate.tpl') {
       return $this->getModDir() . '/' . $template; 
    }
    
}

?>      