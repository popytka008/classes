<?php  require_once("classBase.php"); ?>

<?php
/* <!--  элемент формы input->HIDDEN  --> */
class Hidden extends Control {
    // личные свойства поля загрузки файлов
    protected $value;

    public function __construct ($name = "MyName", $owner = null) {
        parent::__construct($name, $owner);
        $this->value = "Какое-то скрытое значение для работы";
    }

    // get | set
    public function getValue() { return $this->value; }

    public function setValue($value) { $this->value = $value; }
    public function addValue($value) { $this->value .= $value; }

    public function write() {
        $strout = "<input type='hidden' id='$this->id' name='$this->name' value='$this->value'";

        return ($strout . " />");
    }
    public function writeln() { return $this->write() . "\n"; }
    
    static public function createHidden($name, $value = "Какое-то скрытое значение для работы"){
        $tmp = new Hidden($name, $value);
        return $tmp;
    }
}
?>
