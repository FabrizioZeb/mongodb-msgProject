<?php

    session_start();
    require('./dbconnect.php');

    if(isset($_SESSION['user'])){
        header('Location: home.html');
    }

    if (isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = hash('sha256', $_POST['password']);
        #$result = $db->Users->findOne({username: Users.username});
        #if(!$result){
        $result = $db->Users->insertOne(array(
            'username'=>$username,
            'password'=>$password
        ));
        header('Location: index.html');
        #}
        #else echo "Username already exists";
        
        
    }
?>


