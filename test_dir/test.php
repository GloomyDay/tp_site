<?php
$name = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);
var_dump($name);
echo strlen($name); 