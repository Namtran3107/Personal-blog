<?php

$count_page = ("admin/include/count.txt");
$hits = file($count_page);
$hits[0] ++;

$fp = fopen($count_page , "w");
fputs($fp , "$hits[0]");
fclose($fp);

?>