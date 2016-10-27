<?php
function dd($a){
    echo "<pre>";
    print_r($a);
    echo "</pre>";
}

function requestIsPost()
{
    return strtolower($_SERVER['REQUEST_METHOD']) == 'post';
}

function post($key, $default = null)
{
    // ?? in PHP 7
    return isset($_POST[$key]) ? $_POST[$key] : $default;
}

function get($key, $default = null)
{
    // ?? in PHP 7
    return isset($_GET[$key]) ? $_GET[$key] : $default;
}

function requestIsGet()
{
    return (bool)$_GET;
}

function formIsValid()
{
    return post('username') != ''
    && post('email') != ''
    && post('message') != '';
}
function redirect($to)
{
    header('Location: ' . $to);
    die;
}
function save(array $comment, $filename = 'comments.txt')
{
    $comment = serialize($comment);
    $res = file_put_contents(
        $filename,
        $comment . PHP_EOL,
        FILE_APPEND
    );

    if (!$res) {
        die('Error (');
    }
}
function checkboxIsChecked($key)
{
    return post($key) == 'on';
}

function setFlash($message)
{
    $_SESSION['flash_message'] = $message;
}
function getFlash()
{
    if (!isset($_SESSION['flash_message'])) {
        return null;
    }
    $message = $_SESSION['flash_message'];
    unset($_SESSION['flash_message']);
    return $message;
}

