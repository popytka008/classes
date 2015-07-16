<?php  require_once("include.php"); ?>


<html>
<!-- onchange="alert('index = '+this.selectedIndex + '\n' + 'value = '+this.value+ '\n' + 'text = '+this.options[selectedIndex].text+ '\n' + 'defaultSelected = '+this.options[selectedIndex].defaultSelected);"
-->
<body>
  <div>
    <select  >
        <?php
          $option = new Option();
          $option->initOption("Буратина", "Тута Буратина");
          echo $option->writeln();
          $option = new Option();
          $option->initOption("Мальвина", "Тута Мальвина", Primitive::NO, Primitive::YES);
          echo $option->writeln();
          $option = new Option();
          $option->initOption("Д`Артаньян", "Здеся Д`Артаньян");
          echo $option->writeln();
        ?>
    </select>
  </div>

  <script>
var select = document.querySelector("select");

select.onchange = function() {
  alert('value = '+select.value +'\n' + 'index = '+select.selectedIndex + '\n'
  + 'text = '+select.options[select.selectedIndex].text + '\n'
  + 'defaultSelected = '+select.options[select.selectedIndex].defaultSelected);
  return true;

//alert('index = '+select.selectedIndex + '\n' + 'value = '+select.value + '\n' + 'text = '+select.options[select.selectedIndex].text+ '\n' + 'defaultSelected = '+select.options[select.selectedIndex].defaultSelected);
};
</script>
<body>
</html>
