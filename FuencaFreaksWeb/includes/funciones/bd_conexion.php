<?php
    $db = new mysqli('localhost','root','root','fuencafreaksfactory');

    if($db->connect_error){
        echo $error -> $db->connect_error;
    }
?>
