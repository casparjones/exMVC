<?php
class dir_IndexAction extends exBaseAction {
  
  public function execute(exRequestDataHolder $rd) {
    $dirBrowser = $this->getContext()->getLib('Browser', 'dir');
    $folder = $rd->getParameter('f', '/');
    $showPath = exDIR . $folder;
    $dirBrowser->setIgnoreFiles(array('^.*\.php$', exSUBDIR));
    $dirBrowser->reloadDir($showPath);
    
    $this->setAttribute('dirBrowser', $dirBrowser);
    return 'Success';
  }
  
}

?>