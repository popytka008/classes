<?php require_once("class/classBase.php");  ?>
<?php require_once("class/classSubmit.php");  ?>
<?php require_once("class/classButton.php");  ?>
<?php require_once("class/classReset.php");  ?>
<?php require_once("class/classTextField.php");  ?>
<?php require_once("class/classPwdField.php");  ?>
<?php require_once("class/classRadio.php");  ?>
<?php require_once("class/classCheckbox.php");  ?>
<?php require_once("class/classHidden.php");  ?>
<?php require_once("class/classFileUploadField.php");  ?>
<?php require_once("class/classInputImage.php");  ?>
<?php require_once("class/classTextarea.php");  ?>
<?php require_once("class/classForm.php");  ?>
<?php require_once("class/classSelect.php");  ?>
<?php require_once("class/classTextNode.php");  ?>
<?php require_once("class/classImage.php");  ?>
<?php require_once("class/classLink.php");  ?>
<?php require_once("class/classList.php");  ?>
<?php require_once("class/classRealButton.php");  ?>
<?php require_once("class/classTable.php");  ?>
<?php require_once("class/classTableRow.php");  ?>
<?php require_once("class/classTableData.php");  ?>
<?php require_once("class/classTableDataHeader.php");  ?>
<?php
// сервис-функция двух вариантов вывода
function out ($item, $f = true) {
  echo $item->toString(Cons::WRAP);
  echo Primitive::out($item, $item->doubleTag);
  echo ($f == true) ?np() :"";
}

// создать элемент HTML (объект класса Element)
$elem = new Element ("MyElement");
$elem->setText("Какой-то текст");
$elem->setTag("p");
$elem->doubleTag = Cons::YES;
$elem->setStyle("background-color: black; color: yellow");
//print_r($elem);

// вывести объект двумя способами
//out ($elem);
// создать элемент формы кнопку-SUBMIT (объект класса Submit)
$submit = new Submit("MySubmit");
//echo $submit->getProps();
//echo $submit->getValue().nl();
//echo $submit->getType().nl();
//print_r($submit);

// вывести объект двумя способами
// поменять на $submit->doubleTag вместо Cons::WRAP
//out($submit);
// создать элемент формы кнопку-BUTTON (объект класса Button)
$button = new Button("MyButton");
//out($button);
// создать элемент формы кнопку-RESET (объект класса Reset)
$reset = new Reset("MyReset");
//out($reset);
// создать элемент формы ТЕКСТОВОЕ ПОЛЕ (объект класса TextField)
$text = new TextField("MyText");
//out($text);
// создать элемент формы ТЕКСТОВОЕ ПОЛЕ ПАРОЛЯ (объект класса PwdField)
$pwd = new PwdField("MyPwd");
//out($pwd);
// создать элемент формы RADIO-точка (объект класса Radio)
$radio = new Radio("MyRadio", null, "radio_value");
//out($radio, false);
$checkbox = new Checkbox("MyCheckbox", null, "checkbox_value", Cons::YES);
//out($checkbox, false);
// создать элемент формы НЕВИДИМОЕ ПОЛЕ (объект класса Hidden)
$hidden = new Hidden("MyHidden", null, "radio_value");
//out($hidden, false);
// создать элемент формы ПОЛЕ FILE UPLOAD(объект класса FileUploadField)
$fuf = new FileUploadField("MyFileUploadField", null);
//out($fuf);
// создать элемент - РИСУНОК ФОРМЫ
//$ii = new InputImage("MyInputImage", null, "../mdn/2/images/image2.jpg");
//out($ii);
// элемент - TEXTAREA
$ta = new Textarea("MyTextarea", null, 20,10);
//print_r($ta);
//out($ta);
// элемент - FORM
$form = new Form("MyForm");
//print_r($form);

// контейнер-массив всех созданных элементов
$items = array($submit, $button, $reset, $text, $pwd, $radio, $checkbox, $hidden, $fuf, $ta);
//print_r($items);
$form->setItems($items);
//print_r($form);

echo $form->toString(Cons::WRAP);
//out($form);

$options = array();
for ($i = 0; $i < 7; $i++) {
  $options[] = new Option("option_".$i, null, "text_".$i, "value_".$i);
}
//print_r($options);
$select = new Select("MySelect", null, $options);
//$select->doMultiple();
$select->setSize();
echo $select->toString(Cons::WRAP);

// element TextNode
//1
$a = new TextNode ();
$a->setStyle("color: navy; background-color: yellow;");
//print_r($a);
out($a);
$a->setSpan();
out($a);

//out(new Image("NewImage", null, "../mdn/2/images/image3.jpg"));
$link = new Link("MyLink", null, "../mdn/2/images/image3.jpg", "Проверка ссылок");
$link->addText("Это сцылко на ресунак");
//print_r($link);
out($link);

$listItems = array();
for($i = 0; $i < 2; $i++) {
  $listItems[] = $item = new ListItem();
  $item->addText("Элемент списка № " . ($i+1));
}
$list = new OrderList("MyOrderList", null, Cons::NO, $listItems);
//print_r($list);
out($list);

$rb = new RealButton("MyRealButton");
$rb->addText("Это название кнопки");
$rb->onClick = "alert(\"::))\")";
//print_r($rb);
out($rb);

$tr = new TableRow();
//print_r($tr);
//out($tr);
//$td = new TableData();
//$tr->addCol($td);
$tbl = new Table("MyTable", null, "Таблица №___ Описание этой такой вот таблицы");
//$th = new TableDataHeader("cell_".$tmp, null, "Колонка №".($j+1));
//print_r($th);
//out($th);

for ($i = 0; $i<4; $i++){
  $tr = new TableRow("row_".($i+1));
  for ($j = 0; $j<3; $j++){
    $tmp = ($i+1)."_".($j+1);
    if($i == 0) {
      $th = new TableDataHeader("cell_".$tmp, null, "Колонка №".($j+1));
      $tr->addCol($th);
      continue;
    }
    $td = new TableData("cell_".$tmp);
    $td->addText($tmp);
    $tr->addCol($td);
  }
  $tbl->addRow($tr);
}

//$tbl->addRow($tr);
//print_r($tbl);
out($tbl);


?>