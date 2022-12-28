<?php
namespace lib;

use Throwable;

function route($parse, $method)
{
    try {
        $rpath = ltrim($parse['path'], '/');

        $methodName = '';
        if ($rpath === 'index') {
            require_once ROOT_PATH . 'Views/index.php';
        } else if ($rpath === 'contact' && $method === 'get') {
            $methodName = 'index';
        } else if ($rpath === 'contact' && $method === 'post') {
            $methodName = 'check';
        } else if ($rpath === 'contact/confirm' && $method === 'get') {
            $methodName = 'confirm';
        } else if ($rpath === 'contact/confirm' && $method === 'post') {
            $methodName = 'complete';
        } else if ($rpath === 'contact/edit' && $method === 'get') {
            $methodName = 'edit';
        } else if ($rpath === 'contact/edit' && $method === 'post') {
            $methodName = 'update';
        } else if ($rpath === 'contact/destroy' && $method === 'post') {
            $methodName = 'destroy';
        }

        require_once ROOT_PATH . 'Controllers/ContactController.php';

        $fn = "\\controller\\ContactController::{$methodName}";
        $fn();
    } catch (Throwable $e) {
        Msg::push(Msg::DEBUG, $e->getMessage());
        require_once ROOT_PATH . 'Views/404.php';
    }
}
