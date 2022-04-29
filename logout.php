<?php 

    session_start();

    if(!isset($_SESSION['user'])) {
        header("Location: index.html" );
    }


    unset($_SESSION['user']);
    session_unset();
    session_destroy();


    header('Location: index.html');

?>  