<?php
// заменить на connect.php
require 'connectPrivate.php';

$url = $_SERVER['REQUEST_URI'];
preg_match('#/page(\d+)#', $url, $match);
$id = (int) $match[1];


$query  = "SELECT * FROM pages WHERE id=$id";
$res = mysqli_query($link, $query) or die(mysqli_error($link));
$page   = mysqli_fetch_assoc($res);

$layout = file_get_contents('layout.php');
$layout = str_replace('{{ title }}', $page['title'], $layout);
$layout = str_replace('{{ content }}', $page['content'], $layout);

echo $layout;

$path = 'view' . $url . '.php';

if (file_exists($path)) {
    $content = file_get_contents($path);
} else {
    header('HTTP/1.0 404 Not Found');
    $content = file_get_contents('view/404.php');
}
