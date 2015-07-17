<?php  require_once("classBase.php"); ?>
<!--
id, css, cls
type, name
-->
<?php
/* <!--  класс ТЕКСТОВЫЙ РЕГИОН <textarea></textarea> формы  --> */
class Textarea extends Control {
    // личные свойства текстового поля
    protected $cols = "35";
    protected $rows = "5";
    protected $wrap;
    protected $content = "Вариант тескта в поле";

    const OFF = "off";
    const VIRT = "virtual";
    const PHYS = "physical";

    public function __construct ($name = "MyName", $owner = null) {
        parent::__construct($name, $owner);
        
    }

    // get | set
    public function getSize() { return array($this->cols, $this->rows); }
    public function getWrap() { return $this->wrap; }

    public function setSize($cols, $rows) { $this->cols = $cols; $this->rows = $rows; }
    public function setWrap($wrap = self::OFF) { $this->wrap = $wrap; }
    
    public function addContent($content) { $this->content = $content; }
    public function Content() { return $this->content; }

    public function write() {
        $strout = "<textarea id='$this->id' name='$this->name' cols='$this->cols' rows='$this->rows'";

        $strout .= ($this->onFocus !== "onFocus=")? ' '.$this->onFocus : "";
        $strout .= ($this->onBlur !== "onBlur=")? ' '.$this->onBlur : "";
        $strout .= ($this->onSelect !== "onSelect=")? ' '.$this->onSelect : "";
        $strout .= ($this->onChange !== "onChange=")? ' '.$this->onChange : "";

        return ($strout . " >$this->content</textarea>");
    }
    public function writeln() { return $this->write() . "\n"; }
    
    static public function createTextarea($name, $cols = "35", $rows = "5") {
        $tmp = new TextArea($name);
        $tmp->setSize($cols, $rows);
        return $tmp;
    }
}
?>