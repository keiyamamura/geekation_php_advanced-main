<?php
namespace lib;

function route($parse, $method)
{
    $rpath = ltrim($parse['path'], '/');
    $targetFile = ROOT_PATH . 'Controllers/' . "{$rpath}.php";

    if (!file_exists($targetFile)) {
        require_once ROOT_PATH . 'Views/404.php';
        return;
    }

    require_once $targetFile;

    $rpath = str_replace('/', '\\', $rpath);
    $fn = "\\controller\\{$rpath}\\{$method}";
    $fn();
}
