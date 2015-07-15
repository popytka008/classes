<?php  require_once("classBase.php"); ?>
<?php  require_once("classTextarea.php"); ?>
<?php  require_once("classHidden.php"); ?>
<?php  require_once("classForm.php"); ?>
<?php  require_once("classElement.php"); ?>
<?php  require_once("classImageButton.php"); ?>
<?php  require_once("classTextNode.php"); ?>
<?php
$t =<<<GIT
Это пособие разработано и выпущено клубом самодеятельной песни "ПОИСК"
г. Арзамас-16 и оно должно  помочь  тем  людям,  которые  очень  хотят
научиться  элементарному  аккомпанементу  самодеятельной   песни    на
шестиструнной гитаре.
GIT;
$controls = array();
$controls[] = Textarea::createTextarea("MyTextarea", "50", "10");
$controls[] = Hidden::createHidden("MyHidden");
$q = "../mdn/1/images/image1.jpg";
$controls[] = ImageButton::createImageButton("MyImageButton", $q);
$html = Form::createForm("MyForm");
$html->setControls($controls);

$p = Element::createElement("anotherElement", "p");
$p->addElement(Hidden::createHidden("else hidden"));
$p->addText("Параграф для всех нас...");

$elem = Element::createElement("elementName");
$elem->addElement($html);
$elem->addElement($p);

$txt = TextNode::createTextNode(null,$t);
$p->addElement($txt);
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
