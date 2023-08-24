<?php
// укажите свои данные базы
$host = ''; // имя хоста
$user = '';      // имя пользователя
$pass = '';          // пароль
$name = '';      // имя базы данных

$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");
