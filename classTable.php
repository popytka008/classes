<?php  require_once("classBase.php"); ?>
<?php
/* <!--  супер-элемент TABLE --> */
class Table extends Control {
  // личные свойства поля загрузки файлов
  protected $tag = "table";
  protected $caption = "";
  protected $summary = "";
  
  protected $rows = array();  

  public function __construct ($name = null, $owner = null) {
    parent::__construct($name, $owner);
  }

  // get | set
  public function getTag() { return $this->tag; }
  public function getCaption() { return $this->caption; }
  public function getRows() { return $this->rows; }

  public function setTag($tag) { $this->tag = $tag; }
  public function setCaption($caption) { $this->summary = $this->caption = $caption; }
  public function setRows($rows) { $this->rows = $rows; }  
  public function addRow($item) { $this->rows[] = $item; }
  

  public function write() {
    $caption = "";
	$tag = "<{$this->tag}";
    $tag .=($this->id != "") ?" id='$this->id'" :"";
    $tag .=($this->name != "") ?" name='$this->name'" :"";
    $tag .=($this->css != "") ?" style='$this->css'" :"";
    $tag .=($this->cls != "") ?" class='$this->cls'" :"";
	$tag .=($this->summary != "") ?" summary='$this->summary'" :"";
    $tag .= ">\n";
    
	$caption .= ($this->caption == "") ?"" : "<caption>{$this->caption}</caption>\n";
	
    $rows = writeControls($this->rows);
    
    return ($tag . $caption . $rows . "</{$this->tag}>");
  }
  
  public function writeln() { return $this->write() . "\n"; }
    
  static public function createTable($name = null, $caption = null, $rows = array()){
    $tmp = new Table($name);
    $tmp->setCaption($caption);
    $tmp->setRows($rows);
    return $tmp;
  }
}
?>
