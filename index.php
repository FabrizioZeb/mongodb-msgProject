<?php

    session_start();
    require_once('dbconnect.php');

    if(isset($_SESSION['user'])){
        header('Location: home.php');
    }

    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = hash('sha256', $_POST['password']);
        $result = $db->Users->findOne(array(
            'username'=>$username,
            'password'=>$password
        ));
        if($result) {
            $_SESSION['user']=$result->_id;
            
            header('Location: home.php');
        }
    }
?>


