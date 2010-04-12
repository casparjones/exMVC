<?php

require_once('TableListener.interface.php');
require_once('HtmlTr.class.php');
require_once('HtmlTd.class.php');

class HtmlTable extends ArrayIterator {
  
  public $colsCount;
  public $width = '100%';
  public $headRow = false;
  
  public function setColsCount($colsCount) {
    $this->colsCount = $colsCount;
  }

  public function executeHtml() {
    echo '<table width="' . $this->width . '">' . $this->executeObjectsHtml() . '</table>';
  }
  
  public function setHeadRow($headRow) {
    $this->headRow = $headRow;
  }
  
  private function executeObjectsHtml() {
    $html = '';
    foreach($this as $obj) {
      $html .= $obj->executeHtml();
    }
    
    return $html;
  }
  
}

?>