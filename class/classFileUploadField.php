<?php  require_once("classBase.php"); ?>

<?php
/* <!--  базовый класс элементов формы  --> */
class FileUploadField extends Control {
    // личные свойства поля загрузки файлов
    protected $size;
	protected $multiple = FileUploadField::SINGLE;
	
	const MULTY = "true";
	const SINGLE= "false";

	public function __construct ($name = "MyName", $owner = null) {
        parent::__construct($name, $owner);
		
        $this->type = "file";
        $this->size = "15";
    }

    // get | set
    public function getSize() { return $this->size; }
	public function getMultiple() { return $this->multiple; }

    public function setSize($size) { $this->size = $size; }
    public function setMultiple($m = FileUploadField::SINGLE) { $this->multiple = $m; }

    public function write() {
        $strout = "<input type='file' id='$this->id' name='$this->name' size='$this->size'  ";
        $strout .= ($this->multiple !== FileUploadField::SINGLE)? " multiple='$this->multiple'" : "";
		
        $strout .= ($this->onFocus !== "onFocus=")? ' '.$this->onFocus : "";
        $strout .= ($this->onBlur !== "onBlur=")? ' '.$this->onBlur : "";
        $strout .= ($this->onSelect !== "onSelect=")? ' '.$this->onSelect : "";
        $strout .= ($this->onChange !== "onChange=")? ' '.$this->onChange : "";

        return ($strout . " />");
    }
}
?>

