<?php  require_once("classBase.php"); ?>
<?php  require_once("classTextarea.php"); ?>
<?php  require_once("classHidden.php"); ?>
<?php  require_once("classForm.php"); ?>
<?php  require_once("classElement.php"); ?>
<?php  require_once("classImageButton.php"); ?>
<?php
$controls = array();
$controls[] = Textarea::createTextarea("MyTextarea", "50", "10");
$controls[] = Hidden::createHidden("MyHidden");
$q = "../mdn/1/images/image1.jpg";
$controls[] = ImageButton::createImageButton("MyImageButton", $q);
$html = Form::createForm("MyForm");
$html->setControls($controls);

$p = Element::createElement("anotherElement", "p");
$p->setText("Параграф для всех нас...");
$p->addElement(Hidden::createHidden("else hidden"));

$elem = Element::createElement("elementName");
$elem->addElement($html);
$elem->addElement($p);

echo $elem->writeln();
?>
<!--
<script language="javascript">
  function writeme() {
  document.write("<div>");
  document.write("<input type='image' alt='image' title='Какая-то инфа'/>");
  document.write("</div>");
  }
</script>
<script>writeme();</script>
-->
