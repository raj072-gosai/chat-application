<?php
    include_once "config.php";
    $searchTerm = mysqli_real_escape_string($_conn, $_POST['searchTerm']);
    $output = "";
    $sql = mysqli_query($_conn, "SELECT * FROM users WHERE fname LIKE '%{$searchTerm}%' OR lname  LIKE '%{$searchTerm}%'");
    if(mysqli_num_rows($sql) > 0){
        include "data.php";
    }else{
        $output .= "NO user found rlated to your search term";
    }
    echo $output;
?>