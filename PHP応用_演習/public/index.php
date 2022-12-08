<?php
require_once __DIR__ . '/../config.php';

$parse = parse_url($_SERVER['REQUEST_URI']);
$method = strtolower($_SERVER['REQUEST_METHOD']);

if (mb_substr($parse['path'], -1) === '/') {
    $parse['path'] .= 'index';
}

route($parse, $method);

function route($parse, $method)
{
    $rpath = str_replace(BASE_CONTEXT_PATH, '', $parse['path']);

    $targetFile = ROOT_PATH . 'Controllers/' . "{$rpath}.php";

    if (!file_exists($targetFile)) {
        require_once ROOT_PATH . 'Views/404.php';
        return;
    }

    require_once $targetFile;

    $fn = "\\controller\\{$rpath}\\{$method}";
    $fn();
}
