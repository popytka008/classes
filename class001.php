<?php  require_once("classBase.php"); ?>
<?php  require_once("classTextField.php"); ?>


<?php 
$text = new TextField();
$text->onFocus .= "'select();'";
$text->onChange .= "'alert(this.value)'";

$text->setDefaultValue("САША МАША НАДЯ");
print_r($text);
echo "<p />\n";
echo $text->write();
?>


<?php echo "\n<p />\n"?>
<?php
print_r (new TextField()); 
?>
