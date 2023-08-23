<?php
$url = $_SERVER['REQUEST_URI'];

$layout  = file_get_contents('layout.php');
$content = file_get_contents('./view/' . 'page1.php');

$layout = str_replace('{{ content }}', $content, $layout);

echo $layout;
