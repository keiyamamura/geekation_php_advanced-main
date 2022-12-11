<?php

require_once __DIR__ . '/../config.php';

// Db
require_once ROOT_PATH . 'Db/database.php';
require_once ROOT_PATH . 'Db/datasource.php';
require_once ROOT_PATH . 'Db/contact.query.php';

use db\ContactQuery;

$contact = new ContactQuery;
$result = $contact->fetchByAll();
var_dump($result);

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
