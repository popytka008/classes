<?php  require_once("classBase.php"); ?>
<?php
/* <!--  под-элемент table->tr->TD --> */
class TableData extends Control {
  // личные свойства поля загрузки файлов
  protected $tag = "td";
  
  // в массиве - дерево любых элементов HTML
  protected $elements = array();

  public function __construct ($name = null, $owner = null) {
    parent::__construct($name, $owner);
  }

  // get | set
  public function getElements() { return $this->elements; }

  public function setElements($items) { $this->elements = $items; }  
  public function addElement($item) { $this->elements[] = $item; }
  
  public function write() {
    $tag = "<{$this->tag}";
    $tag .=($this->id != "") ?" id='$this->id'" :"";
    $tag .=($this->name != "") ?" name='$this->name'" :"";
    $tag .=($this->css != "") ?" style='$this->css'" :"";
    $tag .=($this->cls != "") ?" class='$this->cls'" :"";
    $tag .= ">\n";
    
    $elements = writeControls($this->elements);
    
    return ($tag . $elements . "</{$this->tag}>");  
  }
  
  public function writeln() { return $this->write() . "\n"; }
    
  static public function createTableData($name = null, $items = array()){
    $tmp = new TableData($name);
    $tmp->setElements($items);
    return $tmp;
  }
}
?>
