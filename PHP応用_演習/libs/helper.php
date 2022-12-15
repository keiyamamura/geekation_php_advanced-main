<?php
function get_param($key, $default_val, $is_post = true)
{
    $arr = $is_post ? $_POST : $_GET;
    return $arr[$key] ?? $default_val;
}

function redirect($path)
{
    if ($path === GO_CONTACT_INDEX) {
        $path = get_url('contact/index');
    } elseif ($path === GO_REFERER) {
        $path = $_SERVER['HTTP_REFERER'];
    } else {
        $path = get_url($path);
    }

    header("Location: {$path}");
    die();
}

function get_url($path)
{
    return BASE_CONTEXT_PATH . trim($path, '/');
}

function the_url($path)
{
    echo get_url($path);
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
