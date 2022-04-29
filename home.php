<?php

    session_start();
    require_once('./dbconnect.php');
    if(!isset($_SESSION['user'])){
        header("location: index.html");
    }

    
    $userData = $db->Users->findOne(array('_id' => $_SESSION['user']));

?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>Home</h1>
        <?php
            include ('header.php'); 
        ?>
        <form method="post" action ="create_msg.php">
            <fieldset>
                <label for="msg"> Hi</label><br>
                <textarea name="body" rows="8" cols= "50">
                </textarea>
                <br>
                <input type="submit" value="msg"/>
            </fieldset>
        </form>
    </body>
</html>

