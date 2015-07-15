<?php  require_once("classBase.php"); ?>
<?php
/* <!--  класс элементов списка {ol/ul}->LI --> */
class ListItem extends Control {
  protected $elements = array();
  protected $tag = "li";
    
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

  static public function createListItem($name, $elements) {
    $tmp = new ListItem($name);
    $tmp->elements = $elements;
    return $tmp;
  }
}
?>
 
<?php
/* <!--  класс элементов списка {OL/UL}  --> */
class OrderList extends Control {
  // личные свойства текстового поля
  protected $order = Primitive::NO;   // тип списка (упорядоченый/неупорядоченый)
  protected $items = array(); // массив - элементы списка
  protected $tag = "";
  
  public function __construct ($name = null, $owner = null) {
    parent::__construct($name, $owner);    
  }

  // get | set
  public function getItems() { return $this->items; } // массив объектов Option
  public function getOrder() { return $this->order; } // значение поля size

  public function setItems( $items) { $this->items = $items; }
  public function setOrder($order) { $this->order = $order; }
  
  public function addItem($item) { $this->items[] = $item; }
  
  
  public function write() {
    $this->tag = ($this->order === Primitive::NO) ?"ul" : "ol";
    $tag = "<{$this->tag}";
    $tag .=($this->id != "") ?" id='$this->id'" :"";
    $tag .=($this->name != "") ?" name='$this->name'" :"";
    $tag .=($this->css != "") ?" style='$this->css'" :"";
    $tag .=($this->cls != "") ?" class='$this->cls'" :"";
    $tag .= ">\n";
    
    $items = writeControls($this->items);
    
    return ($tag . $items . "</{$this->tag}>");
  }
  
  public function writeln() { return $this->write() . "\n"; }
  
  static public function createOrderList($name, $items = array()) {
    $tmp = new OrderList($name);
    $tmp->setItems($items);
    return $tmp;
  }
}
?>