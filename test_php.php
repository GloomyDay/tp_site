<?php
$var1="test";       
$var2='$var1';
echo "$var1";
echo"<br>";
echo settype($var2,"string");
echo "$var2";
echo"<br>";
var_dump($var2,"string");
echo"<br>";
?>