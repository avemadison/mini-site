<?php
include 'flash.php';
$count = isset($_COOKIE['count']) ? (int)$_COOKIE['count'] : 0;
$count++;
setcookie('count', $count, time() + 60 * 60 * 24 * 366, '/');
?>
Hello! You visited this page <?=$count; ?> times. <br/>
<style>
    body { background: url(../inc/image/picture4.jpg); }
</style>
