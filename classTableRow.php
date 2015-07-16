<?php  require_once("classBase.php"); ?>
<?php
/* <!--  под-элемент table->TR --> */
class TableRow extends Control {
  // личные свойства поля загрузки файлов
  protected $tag = "tr";
  
  // только td/th - элементы таблицы исключительно
  protected $cols = array();  

  public function __construct ($name = null, $owner = null) {
    parent::__construct($name, $owner);
  }

  // get | set
  public function getCols() { return $this->cols; }
  public function getLength() { return count($this->cols); }
  

  public function setCols($items) { $this->cols = $items; }  
  public function addCol($item) { $this->cols[] = $item; }
  
  public function write() {
    $tag = "<{$this->tag}";
    $tag .=($this->id != "") ?" id='$this->id'" :"";
    $tag .=($this->name != "") ?" name='$this->name'" :"";
    $tag .=($this->css != "") ?" style='$this->css'" :"";
    $tag .=($this->cls != "") ?" class='$this->cls'" :"";
    $tag .= ">\n";
    
    $cols = writeControls($this->cols);
    
    return ($tag . $cols . "</{$this->tag}>");  
  }
  
  public function writeln() { return $this->write() . "\n"; }
  
  static public function createTableRow($name = null, $items = array()){
    $tmp = new TableRow($name);
    $tmp->setCols($items);
    return $tmp;
  }
}
?>
