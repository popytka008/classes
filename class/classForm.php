<?php  require_once("classBase.php"); ?>
<?php
/* <!--  элемент ФОРМА             --> */
class Form extends Control {
  // личные свойства поля загрузки файлов    
  protected $action = "";
  protected $target = "";
  protected $controls = array();

  public function __construct ($name = "MyName", $owner = null) {
    parent::__construct($name, $owner);
  }
  // get | set
  public function getAction() { return $this->action; }
  public function getTarget() { return $this->target; }
  public function getControls() { return $this->controls; }
  
  public function setAction($action) { $this->action = $action; }
  public function setTarget($target) { $this->target = $target; }
  public function setControls($controls) { $this->controls = $controls; }
  public function addControl($item) {
    $this->controls[] = $item;
    //print_r($this->controls);
  }
  
  public function write() {
    $strout = "<form id='$this->id' name='$this->name'";
    $strout .= ($this->action !== "")? " action='$this->action'" : "";
    $strout .= ($this->target !== "")? " target='$this->target'" : "";
    $strout .= " >\n";
    $tmp = writeControls($this->controls);
    $strout .= $tmp;
    return $strout . "</form>";
    //$tmp = print_r($this->controls);
    //$tmp = "{ЗАГЛУШКА}";
  }
  public function writeln() { return $this->write() . "\n"; }
    
  static public function createForm($name, $controls = array()){
    $tmp = new Form($name);
    $tmp->setControls($controls);
    return $tmp;
  }
}
?>

