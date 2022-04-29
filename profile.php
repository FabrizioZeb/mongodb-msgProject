<?php

    session_start();
    require_once('./dbconnect.php');

    if(!isset($_SESSION['user'])){
        header('Location: index.php');
    }

    if(!isset($_GET['id'])){
        header('location: index.php');
    }

    $userData = $db->Users->findOne(array('_id' => $_SESSION['user']));
    $profile_id = $_GET['id'];
    $profileData = $db->Users->findOne(array('_id' => new MongoDB\BSON\ObjectId("$profile_id")));

    function get_recent_msg($db){
        $id = $_GET['id'];
        $result = $db->Messages->find(array('authorId' => new MongoDB\BSON\ObjectId("$id")));
        $recent_msg = iterator_to_array($result);
        return $recent_msg;
    }



?>

<html>
    
    <head>
    </head>
    <body>
    <?php include('header.php') ?>
    <div>
        <?php 
            $recent_msg = get_recent_msg($db);

            foreach ($recent_msg as $msg){
                echo '<article>';
                echo '<p><a href = "profile.php?id=' . $msg['authorId'] . '">' . $msg['authorName'] . '</a></p>';
                echo '<p>' . $msg['body'] . '</p>';
                echo '<p>' . $msg['dateCreated'] . '</p>';
                
            }
        ?>    

    </div>
    </body>
    
    </html>
