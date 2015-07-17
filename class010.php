<?php require_once("class/classBase.php");  ?>
<?php require_once("class/classButtons.php");  ?>
<?php
// создать элемент HTML (объект класса Element)
$elem = new Element ("MyElement");
$elem->setText("Какой-то текст");
$elem->setTag("p");
$elem->doubleTag = Cons::YES;
$elem->setStyle("background-color: black; color: yellow");
//print_r($elem);

// вывести объект двумя способами
echo $elem->toString(Cons::WRAP);
echo Primitive::out($elem, $elem->doubleTag);

// создать элемент формы кнопку-SUBMIT (объект класса Submit)
$submit = new Submit("MySubmit");
//print_r($submit);

// вывести объект двумя способами
echo $submit->toString(Cons::WRAP);
echo Primitive::out($submit, $submit->doubleTag);
?>