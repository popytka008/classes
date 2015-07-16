<?php  require_once("classBase.php"); ?>
<?php  require_once("classTextarea.php"); ?>
<?php  require_once("classHidden.php"); ?>
<?php  require_once("classForm.php"); ?>
<?php  require_once("classElement.php"); ?>
<?php  require_once("classImageButton.php"); ?>
<?php  require_once("classTextNode.php"); ?>
<?php  require_once("classList.php"); ?>
<?php  require_once("classLink.php"); ?>
<?php  require_once("classImage.php"); ?>

<?php  require_once("classTable.php");  ?>
<?php  require_once("classTableRow.php");  ?>
<?php  require_once("classTableData.php");  ?>
<?php  require_once("classTableDataHeader.php");  ?>
<?php
/*
создать таблицу
таблица Х
  заголовок
  строка Х
    з-столбец А
    з-столбец Б
    з-столбец В
  Х
  строка Х    // и в цикле можно
    столбец А
    столбец Б
    столбец В
  Х
Х
*/
// таблица + заголовок - содержимое
$rows = array(); $x = 3; // x - количество строк
$tbl = Table::createTable("MyTable", "Таблица №1. Пример таблицы.");

// заглавная строка в таблице.
$tr  = TableRow::createTableRow();

$th = TableDataHeader::createTableDataHeader(null, "столбец А");
$tr->addCol($th);
$th = TableDataHeader::createTableDataHeader(null, "столбец Б");
$tr->addCol($th);
$th = TableDataHeader::createTableDataHeader(null, "столбец В");
$tr->addCol($th);

// добавить заглавную строку
$tbl->addRow($tr);

for ($i = 0; $i < $x; $i++){                  // к-во строк
  $tr  = TableRow::createTableRow();  
  for ($j = 0; $j < 3/*$tr->getLength()*/; $j++){  // к-во столбцов
    $txt = TextNode::createTextNode(null, "ячейка:" . ($i+1) . "_" . ($j+1));    
    $td = TableData::createTableData("td_" . ($i+1) . "_" . ($j+1), array($txt));
    //print_r($td);
    $tr->addCol($td);
  }
if ($i%2) { $tr->SetClass("even"); } else { $tr->SetClass("noteven"); }
  $tbl->addRow($tr);  
}
//print_r($tbl);

//print_r ($tr);
//echo $tr->toString();
$html = <<<HTML
<?xml version="1.0" encoding="UTF-8" ?>
<!DOCTYPE html>
<html lang="RU">
    <head>
      <style>.even {background-color:yellow;} .noteven {background-color:cyan;} table {background-color:black; color:white;} table caption {background-color:gray; color:white; padding: 10px;} th { padding: 5px;}</style>
    </head>
    <body>
        <div>
        {$tbl->toString()}
        </div>
    </body>
</html>
HTML;
echo $html;
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
