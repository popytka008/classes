<?php  require_once("classBase.php"); ?>

<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 09.07.15
 * Time: 23:28
 */
/* <!--  кнопка RADIO  --> */
class Checkbox extends Control {
    // личные свойства текстового поля
    protected $value = "xxx";
    protected $comment = "Вариант выбора xxx";
    protected $checked = "false";
    protected $pos = Checkbox::RIGHT;

	const LEFT = "l";
	const RIGHT = "r";
	
    public function __construct ($name = "MyName", $owner = null) {
        parent::__construct($name, $owner);

        $this->type = "checkbox";
    }

    // get | set
    public function getValue() { return $this->value; }
    public function getChecked() { return $this->checked; }
    public function getPos() { return $this->pos; }
    public function getComment() { return $this->comment; }

    public function setValue($value) { $this->value = $value; }
    public function setChecked($checked) { $this->checked = $checked; }
    public function setPos($pos = Checkbox::RIGHT) { $this->pos = $pos; }
    public function setData($value, $comment) {
        $this->value = $value; $this->comment = $comment;
    }

    public function write($strout="") {
        $strout = "<input type='checkbox' name='$this->name' value='$this->value' ";
        $strout .= ($this->checked === "true")? " checked='true'" : "";
        $strout .= ($this->onFocus !== "onFocus=")? ' '.$this->onFocus : "";
        $strout .= ($this->onBlur !== "onBlur=")? ' '.$this->onBlur : "";
        $strout .= ($this->onSelect !== "onSelect=")? ' '.$this->onSelect : "";
        $strout .= ($this->onChange !== "onChange=")? ' '.$this->onChange : "";
        $strout .= ($this->onClick !== "onClick=")? ' '.$this->onClick : "";

        if($this->pos == Checkbox::RIGHT) {
            return ($strout . " />" . $this->comment);
        }

        return ($this->comment .  $strout . " />");
    }
}
?>