<?php

class mp3Player_IndexSuccessView extends exBaseView {
  
  public function executeHtml(exRequestDataHolder $rd) {
    $this->setAttribute('modPubUrl', $this->getModPubUrl());
    $this->setAttribute('playListUrl', urlencode($this->ro->gen('mp3PlayerXml', 'dir')));
  }  

}

?>