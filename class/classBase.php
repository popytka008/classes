<?php /* сервисные функции */  ?>
<?php function nl() { return "<br />\n"; }                   ?>
<?php function np() { return "\n<p />\n"; }                  ?>
<?php 
function writeControls($controls){
  $strout = "";
    foreach($controls as $control) $strout .= $control->writeln();
  return $strout;
}
?>
<?php // константы пакета класс Cons
final class Cons {
  const YES = true;
  const NO = false;
  const WRAP = "nl";
  const PLAIN = "plain";
}
?>
<?php
/* <!--  базовый класс элементов  --> */
/*
_допускаются_только_следующие_элементы_
строковые:
  span (textnode) img a
блочные:
  un/ol li p div 
управления:
  form input textarea button select (option)
табличные:
  (table caption) tr th td
общее:
имя ID стиль класс;
общие события.

Архитектура 
1. Примитив объектов
  1.1 Блочные 
  1.2 Строковые
  1.3. Элементы управления
  1.4. Табличные
замечания:
разделение на строковые и блоковые бессмысленно при использовании стилей
значит->
архитектура 
1. Примитив объектов
  1.1 Блочные + Строковые
  1.2. Элементы управления
  1.3. Табличные
замечания:
отделение табличных от прочих не имеет смысла так как табличные элементы не гомогенные
caption, td, th - строковые, table, tr - блоковые 
значит->
архитектура 
1. Примитив объектов
  1.1  Строковые: {Табличные} {Элементы управления} + элементы HTML
  1.2. Блочные: {Табличные} {Элементы управления} + элементы HTML

Разделение имеет смысл для операций вывода элементов исключительно.
в общем можно делать заодно, уточняя отдельные свойства в конкретном классе

но первый (Primitive) по ходу - исключительно абстрактный
уже второй - с наполнением: class ЭЛЕМЕНТ РАЗМЕТКИ
class ЭЛЕМЕНТ УПРАВЛЕНИЯ - думаю это более правильно, теперь каждый элемент
по возможностям - он и элемент разметки и элемент управления.
И форма здесь ничего не решает. Хотя её наличие очень удобно.
*/
abstract class Primitive {
  // значение типовых событий
  public $onBlur = "";
  public $onChange = "";
  public $onFocus = "";
  public $onSelect = "";
  public $onClick = "";
  // атрибуты для всех тэгов
  protected $id = "";  // id
  protected $css = ""; // style
  protected $cls = ""; // class
  protected $name = "";   // name (= id )
  protected $tag = "";   // tag

  // id родительского элемента
  protected $owner;
  // тип тага (парный / единичный)
  public $doubleTag = Cons::YES;

  // get || set
  public function getID() { return $this->id; }
  public function getStyle() { return $this->css; }
  public function getClass() { return $this->cls; }
  public function getName() { return $this->name; }
  public function getTag() { return $this->tag; }

  public function setID($id) { $this->id = $id; }
  public function setStyle($css) { $this->css = $css; }
  public function setClass($cls) { $this->cls = $cls; }
  public function setName($name) { $this->id = $this->name = $name; }
  public function setTag($tag) { $this->tag = $tag; }
 
  // конструктор
  public function __construct ($name = null, $owner = null) {
    $this->owner = $owner;
    $this->id = $this->name = $name;
    }
    
  // вывести непересекающиеся свойства объекта
  // ввиде пар {пробел}{свойство="значение_свойства"}
  abstract public function getProps();
  // вывести дочерние узлы объекта
  // ввиде списка: {таг (свойства)}{дочерние узлы}{/таг}
  abstract public function itemsOut();
  // метод вывода всего объекта
  // определяется в каждом классе (?)
  // нужно избежать повторений
  abstract public function write();  
  abstract public function writeln();
  // Cons::PLAIN - write() иначе Cons::WRAP - writeln()
  abstract public function toString($key = Cons::PLAIN) ;
  
  // функция класса для вывода (ВОЗМОЖНО ОШИБКА)
  static public function out($item, $doubleTag = Cons::YES) {
    $atr = $item->getProps();

    $atr .= ($item->getID() == "") ?"" : " id='{$item->getID()}'";
    $atr .= ($item->getName() == "") ?"" : " id='{$item->getName()}'";
    $atr .= ($item->getStyle() == "") ?"" : " style='{$item->getStyle()}'";
    $atr .= ($item->getClass() == "") ?"" : " style='{$item->getClass()}'";

    $atr .= ($item->onBlur == "") ?"" : " onBlur='{$item->onBlur}'";
    $atr .= ($item->onChange == "") ?"" : " onChange='{$item->onChange}'";
    $atr .= ($item->onFocus == "") ?"" : " onFocus='{$item->onFocus}'";
    $atr .= ($item->onSelect == "") ?"" : " onSelect='{$item->onSelect}'";
    $atr .= ($item->onClick == "") ?"" : " onClick='{$item->onClick}'";
                      
    if($doubleTag === Cons::YES)
      return "<{$item->getTag()}{$atr}>" . $item->itemsOut() . "</{$item->getTag()}>\n";
    else
      return "<{$item->getTag()}{$atr} />\n";
  }
}
?>
<?php /* ***** начальный (и абстрагированный) класс элементов HTML ****** */
class Element extends Primitive {
  // значение типовых событий
  //public $onClick = "";
  
  // атрибуты для всех тэгов
  //protected $type = "";   // type (input)
  protected $text = "";   // некое текстовое содержимое

  // get || set
  public function getText() { return $this->text; }
  
  // абстрактные методы определены
  public function getProps() { return ""; }
  public function itemsOut() { return $this->text; }
  
    
  //public function setType($type) { $this->type = $type; }
  public function setText($text) { $this->text = $text; }

  // конструктор
  public function __construct ($name = null, $owner = null) {
    parent::__construct ($name, $owner);
  }
    
  // Cons::PLAIN - write() иначе Cons::WRAP - writeln()
  public function toString($key = Cons::PLAIN) {
    return ($key === Cons::WRAP) ?$this->writeln() :$this->write() ;
  }
  
  public function write() {
    $atr = "";
    $atr .= ($this->getID() == "") ?"" : " id='{$this->getID()}'";
    $atr .= ($this->getName() == "") ?"" : " id='{$this->getName()}'";
    $atr .= ($this->getStyle() == "") ?"" : " style='{$this->getStyle()}'";
    $atr .= ($this->getClass() == "") ?"" : " style='{$this->getClass()}'";
    $atr .= $this->getProps();

    $atr .= ($this->onBlur == "") ?"" : " onBlur='{$this->onBlur}'";
    $atr .= ($this->onChange == "") ?"" : " onChange='{$this->onChange}'";
    $atr .= ($this->onFocus == "") ?"" : " onFocus='{$this->onFocus}'";
    $atr .= ($this->onSelect == "") ?"" : " onSelect='{$this->onSelect}'";
    $atr .= ($this->onClick == "") ?"" : " onClick='{$this->onClick}'";
    
    if($this->doubleTag === Cons::YES)
      return "<{$this->tag}{$atr}>" . $this->itemsOut() . "</{$this->tag}>";
    else
      return ("<{$this->tag}{$atr}" . "/>");
  }
  //public function writeln() { return $this->write().nl(); }
  public function writeln() { return $this->write() . "\n"; }
}
?>