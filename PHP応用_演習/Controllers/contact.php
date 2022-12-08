<?php

namespace controller\contact;

function get()
{
    require_once ROOT_PATH . 'Views/' . "contact.php";
}

function post()
{
    echo 'contact post メソッドを受け取りました。';
}
