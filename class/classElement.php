<?php  require_once("classBase.php"); ?>
<?php
/* <!--  блочный элемент DIV P --> */
class Element extends Control {
  // личные свойства поля загрузки файлов
  protected $tag = "div";
  protected $elements = array();

  public function __construct ($name = null, $owner = null) {
    parent::__construct($name, $owner);
  }

  // get | set
  public function getTag() { return $this->tag; }
  public function getElements() { return $this->elements; }

  public function setTag($tag) { $this->tag = $tag; }
  public function setElements($elements) { $this->elements = $elements; }  
  public function addElement($item) { $this->elements[] = $item; }
  
  public function addText($text) { 
    $this->elements[] = $tn = TextNode::createTextNode(null, $text);
    $tn->setSpan(Primitive::YES);
    $tn->setStyle("color:green;");
  }
  

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
    
  static public function createElement($name, $tag = "div", $elems = array()){
    $tmp = new Element($name);
    $tmp->tag = $tag;
    $tmp->setElements($elems);
    return $tmp;
  }
}
?>
