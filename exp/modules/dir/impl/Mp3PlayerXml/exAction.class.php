<?php
class dir_Mp3PlayerXmlAction extends exBaseAction {
  
  public function execute(exRequestDataHolder $rd) {
    $this->getContext()->setOutputType('Xml');
    $dirBrowser = $this->getContext()->getLib('Browser', 'dir');
    $folder = $rd->getParameter('f', '/');
    $showPath = exDIR . $folder;
    $dirBrowser->setIgnoreFiles(array('^.*\.php$', exSUBDIR));
    $dirBrowser->setFilter(array('^.*\.mp3$'));
    $dirBrowser->reloadDir($showPath);
    
    $this->setAttribute('dirBrowser', $dirBrowser);
    
    return 'Success';
  }
  
}

?>