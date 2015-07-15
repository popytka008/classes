<?PHP /* сервисные функции */  ?>
<?php header ("Content-Type: text/html; charset=utf-8"); ?>
<?php function nl() { return "<br />\n"; }                   ?>
<?php function np() { return "\n<p />\n"; }                   ?>
<?php function writeControls($controls){
		$strout = "";
      foreach($controls as $control) $strout .= $control->writeln();
    return $strout;
	}
?>


<?php
/* <!--  базовый класс элементов  --> */
abstract class Primitive {
    // значение типовых событий
    public $onBlur = "onBlur=";
    public $onChange = "onChange=";
    public $onFocus = "onFocus=";
    public $onSelect = "onSelect=";
    public $onClick = "onClick=";
    // атрибуты для всех тэгов
    protected $id;  // id
    protected $css; // style
    protected $cls; // class
    
    const YES = true;
    const NO = false;
    const NL = "nl";
    const PLAIN = "plain";

    public function getID() { return $this->id; }
    public function getStyle() { return $this->css; }
    public function getClass() { return $this->cls; }

    public function setID($id) { $this->id = $id; }
    public function setStyle($css) { $this->css = $css; }
    public function setClass($cls) { $this->cls = $cls; }

    // конструктор
    abstract public function __construct ();

    // метод вывода
    abstract public function write();
    public function writeln() { return $this->write().nl(); }
    public function toString($key = self::PLAIN) {
      return ($key === self::NL) ?$this->writeln() :$this->write() ; //
    }
}
?>

<?php
/* <!--  базовый класс элементов формы --> */
abstract class Control extends Primitive {
    // типовые свойства элементов формы
    protected $type = "";
    protected $name = "";

    // set | get
    public function getType() { return $this->type; }
    public function getName() { return $this->name; }

    public function setType($type) { $this->type = $type; }
    public function setName($name) { $this->id = $this->name = $name; }

    // id (или ссылка) родительского элемента
    protected $owner;

    public function __construct ($name = "MyName", $owner = null) {
        $this->owner = $owner;
        $this->id = $this->name = $name;		
    }
}
?>