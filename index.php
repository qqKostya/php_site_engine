<?php
$url = $_SERVER['REQUEST_URI'];

$layout  = file_get_contents('layout.php');
$content = file_get_contents('view' . $url . '.php');

preg_match('#{{ title: "(.+?)" }}#', $content, $match);
$title = $match[1];
$content = preg_replace('#{{ title: "(.+?)" }}#', '', $content);


$layout = str_replace('{{ title }}', $title, $layout);
$layout = str_replace('{{ content }}', $content, $layout);
echo $layout;

$path = 'view' . $url . '.php';

if (file_exists($path)) {
    $content = file_get_contents($path);
} else {
    header('HTTP/1.0 404 Not Found');
    $content = file_get_contents('view/404.php');
}
