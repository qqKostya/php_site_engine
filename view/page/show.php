<?php
require_once __DIR__ . '../../../connectPrivate.php';

preg_match('#/page/([a-z0-9_-]+)#', $url, $match);
$slug   = $params[1];
$query  = "SELECT * FROM pages WHERE slug='$slug'";

$res = mysqli_query($link, $query) or die(mysqli_error($link));
$page   = mysqli_fetch_assoc($res);

return $page;
