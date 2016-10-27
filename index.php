<?php
session_start();
require 'inc/functions.php';

// если все ок, то GET[page], если нету то home
$page = get('page', 'home');
$page .= '.php';

$allowed_pages = scandir('pages');
array_shift($allowed_pages);
array_shift($allowed_pages);

if (!in_array($page, $allowed_pages)) {
    $page = '404.php';
}
ob_start();
require 'pages/' . $page;
$content = ob_get_clean();
require 'layout.php';
?>


