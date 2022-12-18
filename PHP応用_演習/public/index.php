<?php

require_once __DIR__ . '/../config.php';

// Library
require_once ROOT_PATH . 'libs/router.php';
require_once ROOT_PATH . 'libs/helper.php';

// Db
require_once ROOT_PATH . 'Db/database.php';
require_once ROOT_PATH . 'Db/datasource.php';
require_once ROOT_PATH . 'Db/contact.query.php';

// Model
require_once ROOT_PATH . 'Models/abstract.model.php';
require_once ROOT_PATH . 'Models/contact.model.php';

// Message
require_once ROOT_PATH . 'libs/message.php';

use db\ContactQuery;
use function lib\route;

session_start();
$contact = new ContactQuery;
$result = $contact->fetchByAll();

$parse = parse_url($_SERVER['REQUEST_URI']);
$method = strtolower($_SERVER['REQUEST_METHOD']);

if (mb_substr($parse['path'], -1) === '/') {
    $parse['path'] .= 'index';
}

route($parse, $method);
