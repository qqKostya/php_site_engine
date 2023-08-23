<?php
$url = $_SERVER['REQUEST_URI'];

$layout  = file_get_contents('layout.php');
$content = file_get_contents('view' . $url . '.php');

preg_match('#{{ title: "(.+?)" }}#', $content, $match);
$title = $match[1];
$content = preg_replace('#{{ title: "(.+?)" }}#', '', $content);

$path = 'view' . $url . '.php';

$layout = str_replace('{{ title }}', $title, $layout);
$layout = str_replace('{{ content }}', $content, $layout);
echo $layout;
