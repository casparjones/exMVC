<?php
require_once('HtmlTable.class.php');
require_once('HtmlLink.class.php');
require_once('HtmlSpan.class.php');

class HtmlList extends exBase implements TableListener {

  private $table;
  private $headRow;
  private $rows;
  private $colsCount;
  
  public function __construct() {
    $this->table = new HtmlTable();
  }
  
  public function executeHtml() {
    $this->table->setColsCount($this->colsCount);
    $this->table->setHeadRow($this->headRow);
    foreach($this->rows as $row) {
        $this->table->append($row);
    }
    
    return $this->table->executeHtml();
  }
  
  public function createRow() {
    $row = new HtmlTr();
    $row->addListener($this);    
    $this->rows[] = &$row;
    return $row;
  }  
  
  public function createHeadRow() {
    $row = new HtmlTh();
    $row->addListener($this);    
    $this->headRow = &$row;
    return $row;
  }
  
  public function getId() {
    return 'HtmlList';
  }
  
  public function updateTrCounter($value) {
    if($value > $this->colsCount) {
      $this->colsCount = $value;
    }
  }

}

?>