<?php 

    session_start();
    require_once('./dbconnect.php');


    if(!isset($_SESSION['user'])){
        header('Location: index.html');
    }


    $userData = $db->Users->findOne(array('_id' => $_SESSION['user']));


    function get_user_list($db){
        $result = $db->Users->find();
        $userList = iterator_to_array($result);
        return $userList;
    }


?>


<html>
    <head>

    </head>
    <body>
        <?php
        include('header.php');
        ?>
        <p>Usuarios</p>
        <?php
        $userList = get_user_list($db);
        foreach($userList as $user){
            echo '<span>' . $user['username'] . '</span>';
            echo '  <a href="profile.php?id=' . $user['_id'] . '">Go to profile</a>';
           # echo '  [<a href="profile.php?id=' . $user['_id'] . '">Go to profile</a>';
            echo '<br>';
        }
        ?>
    </body>
</html>