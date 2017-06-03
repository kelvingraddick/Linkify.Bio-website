<?php
    $path = ltrim($_SERVER['REQUEST_URI'], '/');
    $elements = explode('/', $path);
    if (empty($elements[0])) {
        include($_SERVER['DOCUMENT_ROOT']);
    } else {
        $_GET['username'] = $elements[0];
        if (!empty($elements[1]) && $elements[1] == 'demo') {
            $_GET['demo'] = "true";
        }
        include($_SERVER['DOCUMENT_ROOT'].'/user.php');
    }
?>
