<?php
    session_start();
    if(session_destroy()) {
        header("Location: index.php");
    }

    setcookie('id', '', time() - 3600);
    setcookie('key', '', time() - 3600);
?>