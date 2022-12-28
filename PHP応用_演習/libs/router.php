<?php
namespace lib;

use Throwable;

function route($parse, $method)
{
    // try {
        $rpath = ltrim($parse['path'], '/');

        $temp = '';
        if ($rpath === 'index') {
            require_once ROOT_PATH . 'Views/index.php';
        } else if ($rpath === 'contact') {
            $temp = 'Index';
        } else if ($rpath === 'contact/confirm') {
            $temp = 'Confirm';
        } else if ($rpath === 'contact/edit') {
            $temp = 'Edit';
        } else if ($rpath === 'contact/destroy') {
            $temp = 'Destroy';
        }

        $functionName = $method . $temp;
        require_once ROOT_PATH . 'Controllers/ContactController.php';

        $fn = "\\controller\\ContactController::{$functionName}";
        $fn();
    // } catch (Throwable $e) {
    //     Msg::push(Msg::DEBUG, $e->getMessage());
    //     require_once ROOT_PATH . 'Views/404.php';
    // }
}
