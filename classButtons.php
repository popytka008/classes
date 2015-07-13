<?php
/* <!--  кнопка SUBMIT  --> */
class Submit extends Control {
    // личные свойства текстового поля
    protected $value = "здесь был текст";

    public function __construct ($name = "MyName", $owner = null) {
        parent::__construct($name, $owner);

        $this->type = "submit";
    }

    // get | set
    public function getValue() { return $this->value; }

    public function setValue($value) { $this->value = $value; }

    public function write($strout="") {
        $strout = "<input type='submit' name='$this->name' value='$this->value'";
        $strout .= ($this->onFocus !== "onFocus=")? ' '.$this->onFocus : "";
        $strout .= ($this->onBlur !== "onBlur=")? ' '.$this->onBlur : "";
        $strout .= ($this->onSelect !== "onSelect=")? ' '.$this->onSelect : "";
        $strout .= ($this->onChange !== "onChange=")? ' '.$this->onChange : "";
        $strout .= ($this->onClick !== "onClick=")? ' '.$this->onClick : "";
        
        return ($strout . " />");
    }
}
?>

<?php
/* <!--  кнопка RESET  --> */
class Reset extends Control {
    // личные свойства текстового поля
    protected $value = "Reset Form";

    public function __construct ($name = "MyName", $owner = null) {
        parent::__construct($name, $owner);

        $this->type = "reset";
    }

    // get | set
    public function getValue() { return $this->value; }

    public function setValue($value) { $this->value = $value; }

    public function write($strout="") {
        $strout = "<input type='reset' name='$this->name' value='$this->value'";
        $strout .= ($this->onFocus !== "onFocus=")? ' '.$this->onFocus : "";
        $strout .= ($this->onBlur !== "onBlur=")? ' '.$this->onBlur : "";
        $strout .= ($this->onSelect !== "onSelect=")? ' '.$this->onSelect : "";
        $strout .= ($this->onChange !== "onChange=")? ' '.$this->onChange : "";
        $strout .= ($this->onClick !== "onClick=")? ' '.$this->onClick : "";
        
        return ($strout . " />");
    }
}
?>

<?php
/* <!--  кнопка BUTTON  --> */
class Button extends Control {
    // личные свойства текстового поля
    protected $value = "Button for js";

    public function __construct ($name = "MyName", $owner = null) {
        parent::__construct($name, $owner);

        $this->type = "button";
    }

    // get | set
    public function getValue() { return $this->value; }

    public function setValue($value) { $this->value = $value; }

    public function write($strout="") {
        $strout = "<input type='button' name='$this->name' value='$this->value'";
        $strout .= ($this->onFocus !== "onFocus=")? ' '.$this->onFocus : "";
        $strout .= ($this->onBlur !== "onBlur=")? ' '.$this->onBlur : "";
        $strout .= ($this->onSelect !== "onSelect=")? ' '.$this->onSelect : "";
        $strout .= ($this->onChange !== "onChange=")? ' '.$this->onChange : "";
        $strout .= ($this->onClick !== "onClick=")? ' '.$this->onClick : "";
        
        return ($strout . " />");
    }
}
?>
