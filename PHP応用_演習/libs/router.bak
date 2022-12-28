<?php
namespace lib;

use Throwable;

function route($parse, $method)
{
    try {
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
    } catch (Throwable $e) {
        Msg::push(Msg::DEBUG, $e->getMessage());
        Msg::push(Msg::ERROR, '何かがおかしいようです。。');
        require_once ROOT_PATH . 'Views/404.php';
    }
}
