<?php  require_once("classBase.php"); ?>
<?php  require_once("classRadio.php"); ?>
<?php  require_once("classCheckbox.php"); ?>
<?php  require_once("classFileUploadField.php"); ?>


<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 09.07.15
 * Time: 23:40
 */
echo np();
$r = $radio[] =  new Radio("MyRadio");
$r->setData("M", "Мужской пол");

$r = $radio[] =  new Radio("MyRadio");
$r->setData("F", "Женский пол");
$r->setPos(Radio::LEFT);
$r->SetChecked("true");

$r = $radio[] =  new Radio("MyRadio");
$r->setData("-", "Неопределенный пол");
echo writeControls($radio);

echo np();
$checkbox[] = $c = new Checkbox("MyCheckbox");
$c->setData("1", "1. В.В.Путин");
$c->setPos(Checkbox::LEFT);

$checkbox[] = $c =  new Checkbox("MyCheckbox");
$c->setData("2", "2. Александр Невский");
$c->setPos(Checkbox::RIGHT);

$checkbox[] = $c =  new Checkbox("MyCheckbox");
$c->setData("3", "3. Екатерина II Великая");
$c->setPos(Checkbox::LEFT);
writeControls($checkbox);

echo np();
$file = new FileUploadField("MyFile");
//	$file->setMultiple(FileUploadField::MULTY);
echo $file->write();
?>

