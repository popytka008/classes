<?php  require_once("classBase.php"); ?>
<?php
/* <!--   элемент A ссылка --> */
class Link extends Control {
  // личные свойства поля загрузки файлов
  protected $tag = "a";
  protected $href = "";
  protected $title = "пояснение ссылки";
  
  protected $elements = array();

  public function __construct ($name = null, $owner = null) {
    parent::__construct($name, $owner);
  }

  // get | set
  public function getHref() { return $this->href; }
  public function getTitle() { return $this->title; }
  public function getElements() { return $this->elements; }

  public function addHref($href) { $this->href = $href; }
  public function addTitle($title) { $this->title = $title; }  
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
    $tag .=($this->href != "") ?" href='$this->href'" :"";
    $tag .=($this->name != "") ?" name='$this->name'" :"";
    $tag .=($this->title != "") ?" title='$this->title'" :"";
    $tag .=($this->css != "") ?" style='$this->css'" :"";
    $tag .=($this->cls != "") ?" class='$this->cls'" :"";
    $tag .= ">\n";
    
    $elements = writeControls($this->elements);
    
    return ($tag . $elements . "</{$this->tag}>");  
  }
  
  public function writeln() { return $this->write() . "\n"; }
    
  static public function createLink($name = null, $href = null, $elems = array()){
    $tmp = new Link($name);
    $tmp->href = $href;
    $tmp->setElements($elems);
    return $tmp;
  }
}
?>
