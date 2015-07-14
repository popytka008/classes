<?php  require_once("classBase.php"); ?>

<?php
/* <!--  блочный элемент DIV P --> */
class Element extends Control {
  // личные свойства поля загрузки файлов
  protected $tag = "div";
  protected $elements = array();
  protected $text = "";
  

  public function __construct ($name = "MyName", $owner = null) {
    parent::__construct($name, $owner);
  }

  // get | set
  public function getElements() { return $this->elements; }
  public function getTag() { return $this->tag; }
  public function getText() { return $this->text; }

  public function setElements($elements) { $this->elements = $elements; }  
  public function setTag($tag) { $this->tag = $tag; }
  public function setText($text) { $this->text = $text; }
  
  public function addElement($element) { $this->elements[] = $element; }

  public function write() {
    $strout = "<{$this->tag} id='$this->id' name='$this->name'";
    $strout .= " >\n";
    
    $tmp = writeControls($this->elements);
    $text =($this->text != "")? $this->text . "\n": "";
    return ($strout . $tmp . $text . "</{$this->tag}>");  
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
