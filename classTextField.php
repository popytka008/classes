<?php  require_once("classBase.php"); ?>

<?php
/* <!--  базовый класс элементов формы  --> */
class TextField extends Control {
    // личные свойства текстового поля
    protected $value = "";
    protected $defaultValue = "Здесь нужен текст";
    protected $size = "";
    protected $length = "";

    public function __construct ($name = "MyName", $owner = null) {
        parent::__construct($name, $owner);

        $this->type = "text";
        $this->size = "15";
        $this->length = "15";
    }

    // get | set
    public function getValue() { return $this->value; }
    public function getDefaultValue() { return $this->defaultValue; }
    public function getSize() { return $this->size; }
    public function getLength() { return $this->length; }

    public function setValue($value) { $this->value = $value; }
    public function setDefaultValue($defaultValue) { $this->defaultValue = $defaultValue; }
    public function setSize($size) { $this->size = $size; }
    public function setLength($length) { $this->length = $length; }

    public function write() {
        $strout = "<input type='text' id='$this->id' name='$this->name' value='$this->defaultValue' size='$this->size' maxlength='$this->length'";
        $strout .= ($this->onFocus !== "onFocus=")? ' '.$this->onFocus : "";
        $strout .= ($this->onBlur !== "onBlur=")? ' '.$this->onBlur : "";
        $strout .= ($this->onSelect !== "onSelect=")? ' '.$this->onSelect : "";
        $strout .= ($this->onChange !== "onChange=")? ' '.$this->onChange : "";

        return ($strout . " />");
    }
}
?>


<?php
/* <!--  базовый класс элементов формы  --> */
class PwdField extends TextField {
    // личные свойства поля пароля

    public function __construct ($name = "MyName", $owner = null) {
        parent::__construct($name, $owner);

        $this->type = "password";
		$this->defaultValue = "";
    }

    public function write() {
        $strout = "<input type='password' id='$this->id' name='$this->name' value='$this->defaultValue' size='$this->size' maxlength='$this->length'";
        $strout .= ($this->onFocus !== "onFocus=")? ' '.$this->onFocus : "";
        $strout .= ($this->onBlur !== "onBlur=")? ' '.$this->onBlur : "";
        $strout .= ($this->onSelect !== "onSelect=")? ' '.$this->onSelect : "";
        $strout .= ($this->onChange !== "onChange=")? ' '.$this->onChange : "";

        return ($strout . " />");
    }
}

?>