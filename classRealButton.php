<?php  require_once("classBase.php"); ?>
<?php
/* <!--  класс кнопки {BUTTON} --> */
class RealButton extends Control {
  protected $elements = array();
  protected $tag = "button";
    
  public function __construct ($name = null, $owner = null) {
      parent::__construct($name, $owner);
  }

  // get | set
  public function getElements() { return $this->elements; }

  public function setElements($elements) { $this->elements = $elements; }
  
  public function addElement($item) { $this->elements[] = $item; }
  
  public function addText($text) { 
    $this->elements[] = $tn = TextNode::createTextNode(null, $text);
    //$tn->setSpan(Primitive::YES);
    //$tn->setStyle("color:green;");
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

  static public function createRealButton($name = null, $elements = null) {
    $tmp = new RealButton($name);
    $tmp->elements = $elements;
    return $tmp;
  }
}
?>