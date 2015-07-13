<?php  require_once("classBase.php"); ?>
<?php  require_once("classSelect.php"); ?>
<?php  require_once("classButtons.php"); ?>

<html>
<body>
  <form>
    <?php
      $select = new Select("MySelect");
      $select->addOption("Буратина", "Тута Буратина");
      $select->addOption("Мальвина", "Тута Мальвина", Primitive::NO, Primitive::YES);
      $select->addOption("Д`Артаньян", "Здеся Д`Артаньян");
      //print_r ($select);
      echo $select->write();
    ?>
    <?php 
    // проверка восстановления состояния в форме для элемента select
    $reset = new Reset("MyButton");
    $reset->setValue("Нажми меня!");
    echo $reset->writeln();
    ?>
    <?php 
    // проверка выбора итэма по имени в элементе select
    $button = new Button("MyButton");
    $button->setValue("Выбери №0!");
    $button->onClick .= "'alert(document.forms[0][0][0].value);'";
    echo $button->writeln();
    ?>

  </form>

  <script> 
var select = document.querySelector("select");

select.onchange = function() {
  alert('value = '+select.value +'\n' + 'index = '+select.selectedIndex + '\n' 
  + 'text = '+select.options[select.selectedIndex].text + '\n' 
  + 'defaultSelected = '+select.options[select.selectedIndex].defaultSelected);
};
  </script>
<body>
</html>
