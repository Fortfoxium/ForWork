<?php
$DB = mysqli_connect("localhost", "root", "root", "credits") or die("Нет соединения с БД");
mysqli_set_charset($DB, "utf8") or die("Не установлена кодировка соединения");

?>