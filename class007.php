<?php  require_once("include.php"); ?>
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
<?php
$items = array();
for ($i = 0; $i<10; $i++){
    $items[] =
      ListItem::createListItem(
        "item_".$i,
        array(
          Link::createLink(
            "MyFirstLink",
            "class00".$i.".php",
            array(
              TextNode::createTextNode(
                null,
                "Давай по ссылке на class00".$i.".php"
              )   //creaTextNode
            )     //array
          )       //createLink
        )         //array
      );          //createListItem
}
$list = OrderList::createOrderList("MyList", $items);
echo $list->toString();
$link = Link::createLink("MyFirstLink", "http://test/class/class004.php", array(TextNode::createTextNode(null, "Давай по ссылке на class004.php")));

//$link = Link::createLink("MyFirstLink");
//print_r($link);
echo $link->toString();
echo np();
//$name, $src = "", $alt = "", $title = ""
$img = Image::createImage("MyImageHere", "../mdn/1/images/image1.jpg", "Нет рисунка?", "Какой хароший рисунок");
//print_r($img);
echo $img->toString();
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
