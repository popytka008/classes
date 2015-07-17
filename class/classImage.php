<?php  require_once("classBase.php"); ?>
<?php
/* <!--  картинка IMAGE --> */
class Image extends Control {
  // личные свойства текстового поля  
  protected $tag = "img";
  protected $src = "здесь будет адрес рисунка";
  protected $alt = "здесь будет текст вместо рисунка";
  protected $title = "здесь будет комментарий о рисунке";

  public function __construct ($name = null, $owner = null) {
    parent::__construct($name, $owner);
  }

  // get | set
  public function getAlt() { return $this->alt; }
  public function getSrc() { return $this->src; }
  public function getTitle() { return $this->title; }

  public function setSrc($src) { $this->src = $src; }
  public function setAlt($alt) { $this->alt = $alt; }
  public function setTitle($title) { $this->title = $title; }
    
  public function write($strout="") {
    $strout = "<{$this->tag} name='$this->name' src='$this->src' alt='$this->alt' title='$this->title'";
    $strout .= ($this->onFocus !== "onFocus=")? ' '.$this->onFocus : "";
    $strout .= ($this->onBlur !== "onBlur=")? ' '.$this->onBlur : "";
    $strout .= ($this->onSelect !== "onSelect=")? ' '.$this->onSelect : "";
    $strout .= ($this->onChange !== "onChange=")? ' '.$this->onChange : "";
    $strout .= ($this->onClick !== "onClick=")? ' '.$this->onClick : "";
        
    return ($strout . " />");
  }
  public function writeln() { return $this->write() . "\n"; }
    
  static public function createImage($name, $src = "", $alt = "", $title = ""){
    $tmp = new Image($name);
    if($src != "") $tmp->setSrc($src);
    if($alt != "") $tmp->setAlt($alt);
    if($title != "") $tmp->setTitle($title);
    return $tmp;
  }
}
?>
