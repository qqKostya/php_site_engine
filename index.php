<?php
$url = $_SERVER['REQUEST_URI'];

$layout  = file_get_contents('layout.php');
$content = file_get_contents('./view/' . 'page1.php');

preg_match('#{{ title: "(.+?)" }}#', $content, $match);
$title = $match[1];

$layout = str_replace('{{ title }}', $title, $layout);

$content = preg_replace('#{{ title: "(.+?)" }}#', '', $content);

$layout = str_replace('{{ content }}', $content, $layout);
echo $layout;
