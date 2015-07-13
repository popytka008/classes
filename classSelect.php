<?php  require_once("classBase.php"); ?>
<?php
/* <!--  класс элементов выбора select->OPTION --> */
class Option extends Control {
  protected $value;
  protected $text;
  protected $disabled;
  protected $defaultSelected;
  
  public function __construct ($name = "MyName", $owner = null) {
      parent::__construct($name, $owner);
      $this->disabled = Primitive::NO;
      $this->defaultSelected = Primitive::NO;
  }

  public function initOption
  ($value, $text, $disabled = Primitive::NO, $defaultSelected= Primitive::NO) {
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

  static public function createOption($value, $text, $disabled = Primitive::NO, $defaultSelected = Primitive::NO) {
    $tmp = new Option();
    $tmp->initOption($value, $text, $disabled, $defaultSelected);
    return $tmp;
  }
}
?>
 
<?php
/* <!--  кнопка Select  --> */
class Select extends Control {
  // личные свойства текстового поля
  protected $multiple = Primitive::NO;     // множественность выбора
  protected $options = array(); // массив-элементы выбора
  protected $size = "3";   // количество отображаемые элементы

  public function __construct ($name = "MyName", $owner = null) {
    parent::__construct($name, $owner);
    $this->name .= "[]";
  }

  // get | set
  public function getOptions() { return $this->options; } // массив объектов Option
  public function getSize() { return $this->size; } // значение поля size

  public function setOptions( $options) { $this->options = $options; }
  public function setSize($size) { $this->size = $size; }
  
  public function doMultiple($value = Primitive::YES){ $this->multiple = $value; }
  
  public function addOption($value, $text, $disabled = Primitive::NO, $defaultSelected = Primitive::NO) {
    $option = Option::createOption($value, $text, $disabled, $defaultSelected);
    $this->options[] = $option;
  }

  public function write($strout="") {
    $strout = "<select name='$this->name' ";
    $strout = "<select id='$this->id' ";
    $strout .= ($this->multiple === Primitive::YES)? " multiple='true' " : "";

    $strout .= ($this->onFocus !== "onFocus=")? ' '.$this->onFocus : "";
    $strout .= ($this->onBlur !== "onBlur=")? ' '.$this->onBlur : "";
    $strout .= ($this->onSelect !== "onSelect=")? ' '.$this->onSelect : "";
    $strout .= ($this->onChange !== "onChange=")? ' '.$this->onChange : "";
    $strout .= ($this->onClick !== "onClick=")? ' '.$this->onClick : "";
    $strout .= " >" . nl() ;
    
    $strout .= writeControls($this->options);
    
    return $strout . "</select>" . np() ;
  }
  
  static function createSelect($name, $size, $multiple, $options = array()) {
    $tmp = new Select($name);
    $tmp->setSize($size); 
    $tmp->doMultiple($multiple);
    $tmp->setOptions($options);
    return $tmp;
  }
}
?>