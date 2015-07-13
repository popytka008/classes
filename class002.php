<?php  require_once("classBase.php"); ?>
<?php  require_once("classTextField.php"); ?>
<?php  require_once("classButtons.php"); ?>


<?php
echo "<form>\n";
$submit = new Submit("MySubmit");
$submit->setValue("Назови кнопку");
$submit->onFocus .= "'select();'";
$submit->onClick .= "'alert(MyText.value); return false;'";
echo $submit->writeln();
//print_r ($submit);

//echo np();
$text = new TextField("MyText");
echo $text->writeln();
//print_r ($text);

//echo np();
$reset = new Reset("MyReset");
echo $reset->writeln();
//print_r ($reset);

//echo np();
$button = new Button("MyButton");
//$button->onClick .= "'MyText.value = \"Изменение значения\"; return false;'";
$button->onClick .= "'a(); return false;'";
echo $button->writeln();
//print_r ($button);

$tmp = new TextField("NextTextField");
echo $tmp->writeln();

$pwd = new PwdField("MyPwd");
echo $pwd->writeln();

echo "</form>\n";

$CDATA ="
<SCRIPT>
function a() {
    var txt = document.getElementById('".$text->getID()."');
    txt.value='OOOOOOOOOOOO';    
}
</SCRIPT>
";
echo $CDATA;
?>

