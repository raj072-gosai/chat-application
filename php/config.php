<?php 
    $_conn = mysqli_connect('localhost', 'root', '', 'chatapp');
    if(!$_conn){
        echo "database connected" . mysqli_connect_error();
    }
?>