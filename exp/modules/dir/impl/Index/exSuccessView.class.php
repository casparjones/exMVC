<?php

class dir_IndexSuccessView extends exBaseView {
  
  public function executeHtml(exRequestDataHolder $rd) {
    $dirBrowser = $this->getAttribute('dirBrowser');
    $list       = $this->getContext()->getHtmlHelper('List');
    $listObj    = $this->getContext()->getLib('HtmlList', 'htmlHelper');
    
    $rowCounter = 0;
    foreach($dirBrowser->getFolder() as $file) {
      $rowCounter++;
      if($rowCounter === 1) {
        $row = $listObj->createRow();
        $row->createHeaderField()->appendNbsp();
        $row->createHeaderField()->appendText('Filename');
        $row->createHeaderField(array('width' => '100px', 'text-align' => 'right'))->appendText('FileSize');
        $row->createHeaderField(array('width' => '16px'))->appendNbsp();
      }
    
      $row = $listObj->createRow();
      $row->createField()->appendNbsp();
      $row->createField()->appendText($file->getFileName());
      $row->createField()->appendText($file->getSize());
      $row->createField()->appendNbsp();
    }
   
    echo $listObj->executeHtml();
  }  

}

?>