<?php 

    session_start();
    require('./dbconnect.php');

    if(!isset($_POST['body'])){
        exit;
    }


    $user_id = $_SESSION['user'];
    $userdata = $db->Users->findOne(array('_id'=>$user_id));


    $body = substr($_POST['body'],0,120);
    $date = date('d-M-Y H:i:s');

    $db->Messages->insertOne(array(
        'authorId'=>$user_id,
        'authorName' => $userdata['username'],
        'body' => $body,
        'dateCreated' => $date
    ));


    header('Location: home.php' );

?>




