<?php

class exRouting {

  const defaultAction = 'Index';
  const defaultModule = 'mp3Player';

  private $rd;
  private $module;
  private $action;
  
  public function __construct(exRequestDataHolder &$rd) {
    $this->rd = $rd;
    $this->action = $rd->getParameter('action', self::defaultAction);
    $this->module = $rd->getParameter('mod', self::defaultModule);

    $rd->unsetParameter('mod');
    $rd->unsetParameter('action');
  }
  
  public function getAction() {
    return $this->action;
  }
  
  public function getModule() {
    return $this->module;
  }
  
  public function gen($action, $mod = false, $appendParam = array()) {
    if($mod !== false && $this->module != self::defaultModule) {
      $mod = $this->module;
    }

    $param = array('action' => $action, 'mod' => $mod);
    $param = array_merge($param, $appendParam);
    $index = exINDEX . '?' . http_build_query($param);
    return $index;
  }

}

?>