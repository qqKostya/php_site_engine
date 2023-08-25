<?php
require_once __DIR__ . '/connectPrivate.php';

$url = $_SERVER['REQUEST_URI'];

$route = '^/page/(?<catSlug>[a-z0-9_-]+)/(?<pageSlug>[a-z0-9_-]+)$';
if (preg_match("#$route#", $url, $params)) {
    $page = include 'view/page/show.php';
}

$route = '^/page/(?<catSlug>[a-z0-9_-]+)$';
if (preg_match("#$route#", $url, $params)) {
    $page = include 'view/page/category.php';
}

$route = '^/$';
if (preg_match("#$route#", $url, $params)) {
    $page = include 'view/page/all.php';
}

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
