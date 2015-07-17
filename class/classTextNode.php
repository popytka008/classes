<?php  require_once("classBase.php"); ?>

<?php
/* <!--  текстовый элемент InnerText в блочном и любом другом блоке --> */
class TextNode extends Control {
  // личные свойства поля загрузки файлов
  protected $text = "";
  protected $span = Primitive::NO;
  
  public function __construct ($name = null, $owner = null) {
    parent::__construct($name, $owner);
  }

  // get | set
  public function getText() { return $this->text; }
  public function setText($text) { $this->text = $text; }
  public function setSpan($span) { $this->span = $span; }
  
  public function write() {
    $span = ""; $strout = ""; $text = "";
    if ($this->span !== Primitive::NO) {
      $span .= "<span";
      $span .=($this->id != "") ?" id='$this->id'" :"";
      $span .=($this->name != "") ?" name='$this->name'" :"";
      $span .=($this->css != "") ?" style='$this->css'" :"";
      $span .=($this->cls != "") ?" class='$this->cls'" :"";
      $span .= ">";
    }
    $text .=($this->text != "") ?$this->text :"";
        
    $strout = ($span . $text . ($span != "") ?"</span>" : "");
    
    return $span . $text . (($span != "") ?"</span>" : "");
  }
  
  public function writeln() { return $this->write(); }
    
  static public function createTextNode($name, $text = ""){
    $tmp = new TextNode($name);
    $tmp->setText($text);
    $tmp->span = Primitive::YES;
    $tmp->setStyle("color: orange;");
    return $tmp;
  }
}
?>
