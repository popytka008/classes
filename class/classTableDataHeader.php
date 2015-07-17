<?php  require_once("classBase.php"); ?>
<?php
/* <!--  под-элемент table->tr->TD --> */
class TableDataHeader extends Control {
  // личные свойства поля загрузки файлов
  protected $tag = "th";
  protected $text = "";

  public function __construct ($name = null, $owner = null) {
    parent::__construct($name, $owner);	
  }

  // get | set
  public function getText() { return $this->text; }

  public function setText($text) { $this->text = $text; }
  
  public function write() {
    $tag = "<{$this->tag}";
    $tag .=($this->id != "") ?" id='$this->id'" :"";
    $tag .=($this->name != "") ?" name='$this->name'" :"";
    $tag .=($this->css != "") ?" style='$this->css'" :"";
    $tag .=($this->cls != "") ?" class='$this->cls'" :"";
    $tag .= ">";
    
    return ($tag . $this->text . "</{$this->tag}>");  
  }
  
  public function writeln() { return $this->write() . "\n"; }
    
  static public function createTableDataHeader($name = null, $text = ""){
    $tmp = new TableDataHeader($name);
    $tmp->setText($text);
    return $tmp;
  }
}
?>
