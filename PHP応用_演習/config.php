<?php
define('ROOT_PATH', str_replace('public', '', $_SERVER['DOCUMENT_ROOT']));
define('BASE_CONTEXT_PATH', '/');
define('CURRENT_URI', $_SERVER['REQUEST_URI']);
define('DEBUG', false);
// define('GO_CONTACT_INDEX', 'contact/index');
define('GO_CONTACT_INDEX', 'contact');
define('GO_CONFIRM', 'contact/confirm');
define('GO_REFERER', 'referer');
