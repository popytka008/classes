<?php  require_once("include.php"); ?>

<html>
<body>
  <form name = "f1">
    <?php
      $select = new Select("MySelect");
      $select->addOption("Буратина", "Тута Буратина", Primitive::YES);
      $select->addOption("Мальвина", "Тута Мальвина", Primitive::NO, Primitive::YES);
      $select->addOption("Д`Артаньян", "Здеся Д`Артаньян");
      //print_r ($select);
      echo $select->write();
    ?>
    <?php
      // проверка восстановления состояния в форме для элемента select
      $reset = new Reset("MyButton");
      $reset->setValue("Нажми меня!");
      echo $reset->toString();
    ?>
    <?php
    // проверка выбора итэма по имени в элементе select
      $button = new Button("MyButton");
      $button->setValue("Выбери №0!");
      $button->onClick .= "'alert(document.forms[0][0][0].value);'";
      echo $button->toString();
    ?>

  </form>
  <div>
    <form name = "f2">
      <?php
        $options = array();
        // назначение вариантов
        for($i = 1; $i<10; $i++) {
          if ($i == 6) {
            $options[] = Option::createOption($i, "Это значение $i", Primitive::NO, Primitive::YES);
            continue;
          }
          $options[] = Option::createOption($i, "Это значение $i");
        }
        //$size, $multiple, $options = array())
        $select = Select::createSelect("MySelectNew", 3, true, $options);
        //print_r ($select);
        echo $select->write();
      ?>
      <?php
        // проверка восстановления состояния в форме для элемента select
        $reset = new Reset("MyButton");
        $reset->setValue("Нажми меня!");
        echo $reset->toString();
      ?>
      <?php
      // проверка выбора итэма по имени в элементе select
        $button = new Button("MyButton");
        $button->setValue("Выбери №0!");
        $button->onClick .= "'alert(document.forms[0][0][0].value);'";
        echo $button->toString();
      ?>

    </form>
  </div>

  <script language="javascript" type="text/javascript" >
var select = document.querySelector("select");
select.onchange = function() {
  alert('value = '+select.value +'\n' + 'index = '+select.selectedIndex + '\n'
  + 'text = '+select.options[select.selectedIndex].text + '\n'
  + 'defaultSelected = '+select.options[select.selectedIndex].defaultSelected);
                };
var one = document.getElementById('MySelectNew');

one.onchange = function() {
    alert('value = '+one.value +'\n' + 'index = '+one.selectedIndex + '\n'
    + 'text = '+one.options[one.selectedIndex].text + '\n'
    + 'defaultSelected = '+one.options[one.selectedIndex].defaultSelected);
  };
  </script>
<body>
</html>
