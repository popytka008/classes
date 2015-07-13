<?php  require_once("classBase.php"); ?>
<?php
/* <!--  класс элементов выбора select->OPTION --> */
class Option extends Control {
  protected $value;
  protected $text;
  protected $disabled = Primitive::NO;
  protected $defaultSelected = Primitive::NO;
  
  public function __construct ($name = "MyName", $owner = null) {
      parent::__construct($name, $owner);
  }

  public function initOption($value, $text, $disabled = Primitive::NO, $defaultSelected = Primitive::NO) {
    $this->value    = $value;
    $this->text     = $text;
    $this->disabled = $disabled;
    $this->defaultSelected = $defaultSelected;
  }
  
  public function write($strout="") {
    $strout = "<option value='$this->value' ";
    $strout .= ($this->defaultSelected === Primitive::YES)? " selected='true'" : "";
    $strout .= ($this->disabled === Primitive::YES)? " disabled='true'" : "";

    return ($strout . ">$this->text</option>");
  }
}
?>
 
<?php
/* <!--  кнопка Select  --> */
class Select extends Control {
  // личные свойства текстового поля
  protected $selectedIndex = null;// выбранный номер в массиве элементов
  protected $multiple = Primitive::NO;     // множественность выбора
  protected $options = array(); // массив-элементы выбора
  protected $size = "3";   // отображаемые элементы

  public function __construct ($name = "MyName", $owner = null) {
    parent::__construct($name, $owner);
    $this->name .= "[]";
  }

  // get | set
  public function getSelectedIndex() { return $this->selectedIndex; }
  public function setSelectedIndex($selectedIndex) { $this->selectedIndex = $selectedIndex; }
  public function getOptions () { return options; } 
  
  public function addOption($value, $text, $disabled = Primitive::NO, $defaultSelected = Primitive::NO) {
    $this->options[] = $option = new Option();
    $option->initOption($value, $text, $disabled, $defaultSelected);
  }

  public function write($strout="") {
    $strout = "<select name='$this->name' ";
    $strout .= ($this->onFocus !== "onFocus=")? ' '.$this->onFocus : "";
    $strout .= ($this->onBlur !== "onBlur=")? ' '.$this->onBlur : "";
    $strout .= ($this->onSelect !== "onSelect=")? ' '.$this->onSelect : "";
    $strout .= ($this->onChange !== "onChange=")? ' '.$this->onChange : "";
    $strout .= ($this->onClick !== "onClick=")? ' '.$this->onClick : "";
    $strout .= " >" . nl() ;
    
    $strout .= writeControls($this->options);
    
    $strout .= "</select>" . np() ;
    
    return $strout;
  }
}
?>