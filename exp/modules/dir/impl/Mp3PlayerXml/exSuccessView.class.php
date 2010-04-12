<?php

class dir_Mp3PlayerXmlSuccessView extends exBaseView {
  
  public function executeXml(exRequestDataHolder $rd) {
    $dirBrowser = $this->getAttribute('dirBrowser');
    
		$doc = new DOMDocument('1.0', 'utf-8');
		$doc->registerNodeClass('DOMElement', 'exDOMElement');
		$doc->xmlStandalone = true;
		
		$rootNode = $doc->createElement('playlist');
		$rootNode->appendAttribute('version', '1');
		$rootNode->appendAttribute('xmlns', 'http://xspf.org/ns/0/');
		$doc->appendChild($rootNode);
		
		$tracklistNode = $rootNode->appendNode('trackList');
		foreach($dirBrowser->getFolder() as $file) {
        $track = $tracklistNode->appendNode('track');
        $track->appendTextNode('location', $file->getUrl());
        $track->appendTextNode('title', $file->getName());
    }		
    
    return $doc->saveXML();  
  }  

}

?>